/*
 * Created by student id: 40270585
 * version 1: 03/11/2016
 * This is message sanitizer for the bank filtering service
 * it cleans message data and proceeds to the message categoriser
 */

package nbmfs;

import java.util.ArrayList;
import java.util.regex.Pattern;

import javax.swing.JOptionPane;

public class MessageSanitizer
{
	private String msgID;
	private String msgHeader;
	private String msgData;
	private String msgSubject="";
	private ArrayList<String> abbrv = new ArrayList<>();
	private ArrayList<String> expanded = new ArrayList<>();

	
	//assume these 4 items must exist before proceeding for email type, load CSV abbrv file
	public MessageSanitizer(String id, String header, String data, String subject)
	{
		msgID = id;
		msgHeader = header;
		msgData = data;
		msgSubject = subject;
		loadAbbreviations();
		loadExtensions();
	}
	
	//assume these 3 items must exist for tweet or sms, load CSV abbrv file
	public MessageSanitizer(String id, String header, String data)
	{
		msgID = id;
		msgHeader = header;
		msgData = data;
		loadAbbreviations();
		loadExtensions();
	}
	
	//from CSV list in root folder
	private ArrayList<String> loadAbbreviations()
	{
		Abbreviations ab = new Abbreviations();
		
		abbrv.addAll(ab.return_abbreviation());
		return abbrv;
	}
	
	//from CSV list in root folder
	private ArrayList<String> loadExtensions()
	{
		Abbreviations exp = new Abbreviations();
		
		expanded.addAll(exp.return_expanded());
		return expanded;
	}
	
	//replaces all abbreviations with their expanded form
	public void textSanitizer()
	{
		String sanitize = msgData;
		String output = "";
		
		String[] splitmsg = sanitize.split(" ");
		
		for(int j=0; j<splitmsg.length; j++)
		{
			for(int i=0; i<abbrv.size(); i++ )
			{
				if(splitmsg[j].equals(abbrv.get(i)))
				{
					splitmsg[j]=abbrv.get(i)+" <"+expanded.get(i)+"> ";
				}
			}
		}
		//rebuild the output string:
		for (int k = 0; k < splitmsg.length; k++) 
		{
			output=output.concat(" "+splitmsg[k]);
		}
		//proceed to the SMS categorizer:
		MessageCategorizer textCat = new MessageCategorizer(msgID, msgHeader, output);
		textCat.fileSMSWriter();
	}
	
	//clean tweet, create mention list and hashtag list
	public void tweetSanitizer()
	{
		String sanitize = msgData;
		String output="";
		
		ArrayList<String> hashes = new ArrayList<>();
		ArrayList<String> mentioned = new ArrayList<>();
		
		//we look for hashtags here:
		String[] hashtags = sanitize.split(" ");
		
		if(hashtags.length>0)
		{
			for(int i = 0; i<hashtags.length; i++)
			{
				if(hashtags[i].startsWith("#"))
				{
					if(hashtags[i].length()>1)
					{
						hashes.add(hashtags[i]);
					}
				}
			}
		}
		
		//we look for the mentions here:
		String[] mentions = sanitize.split(" ");
		
		if(mentions.length>0)
		{
			for(int i = 0; i<mentions.length; i++)
			{
				if(mentions[i].startsWith("@"))
				{
					if(mentions[i].length()>1)
					{
						mentioned.add(mentions[i]);
					}
				}
			}
		}		
		for(int j=0; j<mentions.length; j++)
		{
			for(int i=0; i<abbrv.size(); i++ )
			{
				if(mentions[j].equals(abbrv.get(i)))
				{
					mentions[j]=abbrv.get(i)+" <"+expanded.get(i)+"> ";
				}
			}
		}
		//rebuild the output string:
		for (int k = 0; k < mentions.length; k++) 
		{
			output=output.concat(" "+mentions[k]);
		}
		
		//proceed to categorizer:
		MessageCategorizer twitter = new MessageCategorizer(msgID, msgHeader, output, mentioned, hashes);
		twitter.fileTwitterWriter();
		
	}
	
	//SIR subject was checked already in the interpreter, thus we need to check the rest of the msg only:
	public void sirSanitizer()
	{
		String sanitizeData = msgData;
		String output ="";
		String sortcode="";

		//use this for saving the nature of incident
		int[] sir = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};
		
		//String[] sirList = {"Theft", "Staff Attack", "ATM Theft", "Raid", "Customer Attack", "Staff Attack", "Bomb Threat", "Terrorism", "Suspicious Incident", "Intelligence", "Cash Loss"};
		
		//check if there is url starting at http://www.pagename.com - rest of page
		ArrayList<String> urls = new ArrayList<>();
		ArrayList<String> urlIDs = new ArrayList<>();
		
		//this is an important check for proper SIR message structure, program wont continue if this is wrong
		boolean beforeSplit = Pattern.matches("^(Sort.Code\\:.[0-9][0-9].[0-9][0-9].[0-9][0-9].Nature.of.Incident\\:.[a-zA-Z]{0,}.{0,}[a-zA-Z]{0,})$", sanitizeData);
		if(beforeSplit==true)
		{
			//split the message
			String[] url = sanitizeData.split(" ");

				for(int i = 0; i<url.length; i++)
				{
					boolean b = Pattern.matches("^(http\\:\\/\\/www\\.[a-zA-Z0-9]{1,}\\.[a-zA-Z0-9]{1,}.{0,})$", url[i]);
					if(b==true)
					{
						urls.add(url[i]);
						String urlID = i+" : "+msgID;
						urlIDs.add(urlID);
						url[i] = "<URL Quarantined> nr:"+i+" ";
					}
				}
			
				//check what is the bank sort code
				for(int i = 0; i<url.length; i++)
				{
					boolean b = Pattern.matches("^([0-9][0-9]\\-[0-9][0-9]\\-[0-9][0-9])$", url[i]);
					
					if(b==true)
					{
						sortcode = url[i];
					}
				}
				
				
				//check if SIR incident belongs to the list:
				for(int i = 0; i<url.length; i++)
				{
					//check if there is SIR type in data:
					boolean a = Pattern.matches("^(Theft)$", url[i]);
					boolean b = Pattern.matches("^(Staff)$", url[i]);
					boolean bb = false;
					if(i<url.length-1)
					{
						bb = Pattern.matches("^(Attack)$", url[i+1]);
					}
					boolean c = Pattern.matches("^(ATM)$", url[i]);
					boolean cc = false;
					if(i<url.length-1)
					{
						cc = Pattern.matches("^(Theft)$", url[i+1]);
					}
					boolean d = Pattern.matches("^(Raid)$", url[i]);
					boolean e = Pattern.matches("^(Customer)$", url[i]);
					boolean ee = false;
					if(i<url.length-1)
					{
						ee = Pattern.matches("^(Attack)$", url[i+1]);
					}
					boolean f = Pattern.matches("^(Staff)$", url[i]);
					boolean ff = false;
					if(i<url.length-1)
					{
						ff = Pattern.matches("^(Attack)$", url[i+1]);
					}
					boolean g = Pattern.matches("^(Bomb)$", url[i]);
					boolean gg = false;
					if(i<url.length-1)
					{
						gg = Pattern.matches("^(Threat)$", url[i+1]);
					}
					boolean h = Pattern.matches("^(Terrorism)$", url[i]);
					boolean l = Pattern.matches("^(Suspicious)$", url[i]);
					boolean ll = false;
					if(i<url.length-1)
					{
						ll = Pattern.matches("^(Incident)$", url[i+1]);
					}
					boolean k = Pattern.matches("^(Intelligence)$", url[i]);
					boolean m = Pattern.matches("^(Cash)$", url[i]);
					boolean mm = false;
					if(i<url.length-1)
					{
						mm = Pattern.matches("^(Loss)$", url[i+1]);
					}
					//if any of the patter is true set this as an incident:
					if(a==true)
					{
						sir[0]=1;
					}
					else if(b==true && bb==true)
					{
						sir[1]=1;
					}
					else if(c==true&&cc==true)
					{
						sir[2]=1;
					}
					else if(d==true)
					{
						sir[3]=1;
					}
					else if(e==true&&ee==true)
					{
						sir[4]=1;
					}
					else if(f==true&&ff==true)
					{
						sir[5]=1;
					}
					else if(g==true&&gg==true)
					{
						sir[6]=1;
					}
					else if(h==true)
					{
						sir[7]=1;
					}
					else if(l==true&&ll==true)
					{
						sir[8]=1;
					}
					else if(k==true)
					{
						sir[9]=1;
					}				
					else if(m==true&&mm==true)
					{
						sir[10]=1;
					}
				}
				//rebuild the message body:
				for(int i = 0; i<url.length; i++)
				{
					output=output.concat(url[i])+" ";
				}
		}
		else
		{
			JOptionPane.showMessageDialog(null, "Message contains missing/wrong email data structure for SIR! program will not continue: "+sanitizeData);
			return;
		}
		//proceed to the categorizer:
		MessageCategorizer sirEmail = new MessageCategorizer(msgID, msgHeader, output, msgSubject, urls, urlIDs, sortcode, sir);
		sirEmail.fileSIREmailWriter();
	}

	//normal email sanitizer 
	public void emailSanitizer()
	{
		String sanitize = msgData;
		String output="";
		ArrayList<String> urls = new ArrayList<>();
		ArrayList<String> urlIDs = new ArrayList<>();
		String[] url = sanitize.split(" ");
		
		if(url.length>0)
		{
			for(int i = 0; i<url.length; i++)
			{
				//check if there is url starting http://www.pagename.com - rest of page
				boolean b = Pattern.matches("^(http\\:\\/\\/www\\.[a-zA-Z0-9]{1,}\\.[a-zA-Z0-9]{1,}.{0,})$", url[i]);
				if(b==true)
				{
					urls.add(url[i]);
					String urlID = i+" : "+msgID;
					urlIDs.add(urlID);
					url[i] = "<URL Quarantined> nr:"+i+" ";
				}
			}
			
			//rebuild the string
			for(int i = 0; i<url.length;i++)
			{
				output=output.concat(url[i])+" ";
			}
			
		}
		//proceed to the categorizer:
		MessageCategorizer standardEmail = new MessageCategorizer(msgID, msgHeader, output, msgSubject, urls, urlIDs);
		standardEmail.fileStandardEmailWriter();
	}
		
}
