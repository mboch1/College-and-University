/*
 * Created by student id: 40270585
 * version 1: 02/11/2016
 * This is message interpeter for the bank filtering service
 */
package nbmfs;

import java.util.ArrayList;
import java.util.regex.Pattern;

import javax.swing.JOptionPane;

public class MessageInterpreter 
{
	private ArrayList<String> input = new ArrayList<>();
	//hold file name
	private String fName;
	
	private boolean id_correct = false;
	private boolean header_correct = false;
	//for standard email
	private boolean subject_correct1 = false;
	//for SIR
	private boolean subject_correct2 = false;
	private boolean data_correct = false;
	
	public MessageInterpreter(){
		
	}
	
	public MessageInterpreter(String fileName) 
	{
		fName = fileName;
	}

	//get data from txt file
	private ArrayList<String> getFileInput(String file)
	{
		JSONFileHandler getFile = new JSONFileHandler();
		input.addAll(getFile.fileReader(file));
		
		//if file doesnt exist: 
		if(input.isEmpty())
		{
			JOptionPane.showMessageDialog(null, "Message doesn't contain data! Reading Failed");
			return null;
		}
		
		return input;	
	}
	
	
	public void checkCorrectness(ArrayList<String> input)
	{
		//check if id is of a supported type:
		String id = input.get(0);
		id_correct = Pattern.matches("^(S[0-9]{9}|E[0-9]{9}|T[0-9]{9})$", id);
		
		//if id is correct proceed... else inform user
		if(id_correct==true)
		{
			//get message header
			String header = input.get(1);
			
			//check header for sms
			if(id.startsWith("S")==true)
			{
				header_correct = Pattern.matches("^(\\+[0-9]{2,32}|00[0-9]{2,32})$", header);
				if(header_correct==true)
				{
					String data = input.get(2);
					
					if(data.length()<=140&&data.length()>0)
					{
						//proceed to sms sanitizer
						MessageSanitizer sanitize = new MessageSanitizer(id,header,data);
						sanitize.textSanitizer();	
					}
				}
				//if not send user an error message
				else
				{
					JOptionPane.showMessageDialog(null, "Message contains wrong phone number! program will not continue");
					return;
				}
			}
			
			//check header for email
			if(id.startsWith("E")==true)
			{
				//thats a very 'relaxed' pattern for a standard email message header
				header_correct = Pattern.matches("^([a-zA-Z0-9\\.]{1,}\\@[a-zA-Z]{1,}\\.[a-z]{2,})$", header);
				
				if(header_correct==true)
				{
					String subject = input.get(3);
					
					//other type of email
					subject_correct1 = Pattern.matches("^(.{1,20})$", subject);
					if(subject_correct1==true)
					{
						//sir incident
						subject_correct2 = Pattern.matches("^(SIR.[0-3][0-9].[0-1][0-9].[0-9][0-9])$", subject);
						if(subject_correct2==true)
						{
							String data = input.get(2);
							data_correct = Pattern.matches("^(.{0,1028})$", data);	
							
							if(data_correct==true)
							{
								//continue to SIR incident sanitizer
								MessageSanitizer sanitize = new MessageSanitizer(id,header,data,subject);
								sanitize.sirSanitizer();
								
							}
							else
							{
								JOptionPane.showMessageDialog(null, "Message contains wrong email data! program will not continue");
								return;
							}
						}
						else
						{
							String data = input.get(2);
							data_correct = Pattern.matches("^(.{0,1028})$", data);
							
							if(data_correct==true)
							{
								//continue to standard email sanitizer
								MessageSanitizer sanitize = new MessageSanitizer(id,header,data,subject);
								sanitize.emailSanitizer();
							}
							else
							{
								JOptionPane.showMessageDialog(null, "Message contains wrong email data! program will not continue");
								return;
							}
						}
					}
					else
					{
						JOptionPane.showMessageDialog(null, "Message contains wrong email subject! program will not continue");
						return;
					}
				}
				else
				{
					JOptionPane.showMessageDialog(null, "Message contains wrong email address! program will not continue");
					return;
				}
				
			}
			
			//check header for twitter
			if(id.startsWith("T")==true)
			{
				header_correct = Pattern.matches("^(\\@.{1,15})$", header);
				if(header_correct==true)
				{
					String data = input.get(2);
					data_correct = Pattern.matches("^(.{0,140})$", data);
					if(data_correct==true)
					{
						//continue with twitter sanitizer
						MessageSanitizer sanitize = new MessageSanitizer(id,header,data);
						sanitize.tweetSanitizer();
						
					}
					else
					{
						JOptionPane.showMessageDialog(null, "Message contains wrong twitter data! program will not continue");
						return;
					}
				}
				else
				{
					JOptionPane.showMessageDialog(null, "Message contains wrong twitter ID! program will not continue");
					return;
				}
			}
		}
		else
		{
			JOptionPane.showMessageDialog(null, "Message contains wrong ID! program will not continue");
			return;
		}
		
	}
	//start the interpreter for message created by the user:
	public void start(String id) 
	{
		//read data from txt file and save it to input array
		this.getFileInput(id+"input");
		checkCorrectness(input);
	}
	
	//start the interpreter for message from existing file:
	public void startFile(String fileName) 
	{
		// read data from existing text file and proceed
		this.getFileInput(fName);
		checkCorrectness(input);
	}
	
}
