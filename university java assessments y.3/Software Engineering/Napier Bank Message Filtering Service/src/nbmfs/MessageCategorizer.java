/*
 * created on 05/11/2016 student id: 40270585
 * handles saving output to the right database part
 * version1
 */
package nbmfs;

import java.io.FileReader;
import java.io.FileWriter;
import java.util.ArrayList;
import java.util.Iterator;

import javax.swing.JOptionPane;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

public class MessageCategorizer extends NBMFSmain
{
	private static final long serialVersionUID = 1L;
	@SuppressWarnings("unused")
	private String sir;
	private String id;
	private String header;
	private String data;
	private String subject;
	private String sortcode;
	private ArrayList<String> urls = new ArrayList<>();
	private ArrayList<String> urlIDs = new ArrayList<>();
	private ArrayList<String> hashtags = new ArrayList<>();
	private ArrayList<String> mentions = new ArrayList<>();
	
	//predefine int[] to avoid issues:
	int[] sir_type = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};
	
	//constructor for SMS
	public MessageCategorizer(String msgID, String msgHeader, String msgData)
	{
		id = msgID;
		header = msgHeader;
		data = msgData;
	}
	
	//constructor for Twitter
	public MessageCategorizer(String msgID, String msgHeader, String msgData, ArrayList<String> mentioned, ArrayList<String> hashes)
	{
		id = msgID;
		header = msgHeader;
		data = msgData;
		mentions.addAll(mentioned);
		hashtags.addAll(hashes);
	}
	
	//constructor for standard email
	public MessageCategorizer(String msgID, String msgHeader, String msgData, String msgSubject, ArrayList<String> urlList, ArrayList<String> urlID)
	{
		id = msgID;
		header = msgHeader;
		data = msgData;
		subject = msgSubject;
		urls.addAll(urlList);
		urlIDs.addAll(urlID);
	}
	
	//constructor for SIR email
	public MessageCategorizer(String msgID, String msgHeader, String msgData, String msgSubject, ArrayList<String> urlList, ArrayList<String> urlID, String banksortcode, int[] sir)
	{
		id = msgID;
		header = msgHeader;
		data = msgData;
		subject = msgSubject;
		sortcode = banksortcode;
		urls.addAll(urlList);
		urlIDs.addAll(urlID);
		sir_type = sir;
	}
	
	//this method adds the SMS data to the file: open - read - add - save
	@SuppressWarnings("unchecked")
	public void fileSMSWriter()
	{	
		ArrayList<String> txtID = new ArrayList<>();
		ArrayList<String> txtHeader = new ArrayList<>();
		ArrayList<String> txtData = new ArrayList<>();

		JSONParser parser = new JSONParser();
		//an empty file was placed to ensure it works, do not remove!
		//first read existing database to fill the arraylists with existing data
		try 
		{
            Object obj = parser.parse(new FileReader("SMSDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
            
            JSONArray idList = (JSONArray) jsonObject.get("id");
            JSONArray headerList = (JSONArray) jsonObject.get("header");
            JSONArray dataList = (JSONArray) jsonObject.get("data");
            
            Iterator<String> iterator1 = idList.iterator();
            
            while (iterator1.hasNext()) 
            {
            	txtID.add(iterator1.next());
            }
            
            Iterator<String> iterator2 = headerList.iterator();
            
            while (iterator2.hasNext()) 
            {
            	txtHeader.add(iterator2.next());
            }
            
            Iterator<String> iterator3 = dataList.iterator();
            
            while (iterator3.hasNext()) 
            {
            	txtData.add(iterator3.next());
            }

        }
        catch (Exception e) 
        {
            e.printStackTrace();
        }
		
		//now we add data from new txt message to the arraylist:
		txtID.add(id);
		txtHeader.add(header);
		txtData.add(data);
		
		//finally we save the updated data [it replaces exisitng file!]:
		JSONObject obj = new JSONObject();
		
		JSONArray txtIds = new JSONArray();
		txtIds.addAll(txtID);
		obj.put("id", txtIds);
		
		JSONArray txtHeaders = new JSONArray();
		txtHeaders.addAll(txtHeader);
		obj.put("header", txtHeaders);
		
		JSONArray txtDat = new JSONArray();
		txtDat.addAll(txtData);
		obj.put("data", txtDat);
		
		

		try (FileWriter file = new FileWriter("SMSDatabase.txt")) 
		{
			file.write(obj.toJSONString());
			String message = "A new SMS was successfully created! ID: "+id+" Header: "+header+" Data: "+data;
			JOptionPane.showMessageDialog(null, message);
			SMSViewer.run_viewer();
		}
		
		catch (Exception e) 
		{
	        e.printStackTrace();
	    }
	}
	
	//save sanitized urls to the database:
	@SuppressWarnings("unchecked")
	public void fileURLWriter()
	{	
		//these arrays will contain existing + new url data
		ArrayList<String> urlIdList = new ArrayList<>();
		ArrayList<String> urlUrlList = new ArrayList<>();

		JSONParser parser = new JSONParser();
		//an empty file was placed to ensure it works, do not remove!
		//first read existing database to fill the arraylists with existing data
		try 
		{
            Object obj = parser.parse(new FileReader("URLDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
            
            JSONArray urlID = (JSONArray) jsonObject.get("id");
            JSONArray urlString = (JSONArray) jsonObject.get("url");
            
            Iterator<String> iterator1 = urlID.iterator();
            
            while (iterator1.hasNext()) 
            {
            	urlIdList.add(iterator1.next());
            }
            
            Iterator<String> iterator2 = urlString.iterator();
            
            while (iterator2.hasNext()) 
            {
            	urlUrlList.add(iterator2.next());
            }

        }
        catch (Exception e) 
        {
            e.printStackTrace();
        }
		
		//now we add data from new txt message to the arraylist:
		urlIdList.addAll(urlIDs);
		urlUrlList.addAll(urls);
		
		//finally we save the updated data [it replaces exisitng file!]:
		JSONObject obj = new JSONObject();
		JSONArray urlIDsList = new JSONArray();
		urlIDsList.addAll(urlIdList);
		obj.put("id", urlIDsList);
		
		JSONArray urlUrlsList = new JSONArray();
		urlUrlsList.addAll(urlUrlList);
		obj.put("url", urlUrlsList);
 
		try (FileWriter file = new FileWriter("URLDatabase.txt")) 
		{
			file.write(obj.toJSONString());
		}
		
		catch (Exception e) 
		{
	        e.printStackTrace();
	    }

	}
	
	
	@SuppressWarnings("unchecked")
	public void fileTwitterWriter()
	{	
		ArrayList<String> twID = new ArrayList<>();
		ArrayList<String> twHeader = new ArrayList<>();
		ArrayList<String> twData = new ArrayList<>();
		ArrayList<String> twMentions = new ArrayList<>();
		ArrayList<String> twHashtags = new ArrayList<>();

		JSONParser parser = new JSONParser();
		//an empty file was placed to ensure it works, do not remove!
		//first read existing database to fill the arraylists with existing data
		try 
		{
            Object obj = parser.parse(new FileReader("TwitterDatabase.txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
            
            JSONArray twid = (JSONArray) jsonObject.get("id");
            JSONArray twhead = (JSONArray) jsonObject.get("header");
            JSONArray twdata = (JSONArray) jsonObject.get("data");
            JSONArray twment = (JSONArray) jsonObject.get("mentions");
            JSONArray twhash = (JSONArray) jsonObject.get("hashtags");
            
            Iterator<String> iterator1 = twid.iterator();
            
            while (iterator1.hasNext()) 
            {
            	twID.add(iterator1.next());
            }
            
            Iterator<String> iterator2 = twhead.iterator();
            
            while (iterator2.hasNext()) 
            {
            	twHeader.add(iterator2.next());
            }
            
            Iterator<String> iterator3 = twdata.iterator();
            
            while (iterator3.hasNext()) 
            {
            	twData.add(iterator3.next());
            }
            
            Iterator<String> iterator4 = twment.iterator();
            
            while (iterator4.hasNext()) 
            {
            	twMentions.add(iterator4.next());
            }
            
            Iterator<String> iterator5 = twhash.iterator();
            
            while (iterator5.hasNext()) 
            {
            	twHashtags.add(iterator5.next());
            }

        }
        catch (Exception e) 
        {
            e.printStackTrace();
        }
		
		//now we add data from new tweet to the arraylist:
		twID.add(id);
		twHeader.add(header);
		twData.add(data);
		twMentions.addAll(mentions);
		twHashtags.addAll(hashtags);
		
		//finally we save the updated data [it replaces exisitng file!]:
		JSONObject obj = new JSONObject();
		
		JSONArray twitterID = new JSONArray();
		twitterID.addAll(twID);
		obj.put("id", twitterID);
		
		JSONArray twitterHeaders = new JSONArray();
		twitterHeaders.addAll(twHeader);
		obj.put("header", twitterHeaders);
		
		JSONArray twitterData = new JSONArray();
		twitterData.addAll(twData);
		obj.put("data", twitterData);
		
		JSONArray twitterMentions = new JSONArray();
		twitterMentions.addAll(twMentions);
		obj.put("mentions", twitterMentions);
		
		JSONArray twitterHashtags = new JSONArray();
		twitterHashtags.addAll(twHashtags);
		obj.put("hashtags", twitterHashtags);
 
		try (FileWriter file = new FileWriter("TwitterDatabase.txt")) 
		{
			file.write(obj.toJSONString());
			String message = "A new Tweet was successfully created! ID: "+id+" Header: "+header+" Data: "+data;
			JOptionPane.showMessageDialog(null, message);
			TwitterViewer.run_viewer();
		}
		
		catch (Exception e) 
		{
	        e.printStackTrace();
	    }
	}
	
		//save standard email message to the database:
		@SuppressWarnings("unchecked")
		public void fileStandardEmailWriter()
		{	
			ArrayList<String> eid = new ArrayList<>();
			ArrayList<String> eheader = new ArrayList<>();
			ArrayList<String> esubject = new ArrayList<>();
			ArrayList<String> edata = new ArrayList<>();
			
			JSONParser parser = new JSONParser();
			//an empty file was placed to ensure it works, do not remove!
			//first read existing database to fill the arraylists with existing data
			try 
			{
	            Object obj = parser.parse(new FileReader("StandardEmailDatabase.txt"));
	            
	            JSONObject jsonObject = (JSONObject) obj;
	            
	            JSONArray emailID = (JSONArray) jsonObject.get("id");
	            JSONArray emailHeader = (JSONArray) jsonObject.get("header");
	            JSONArray emailSubject = (JSONArray) jsonObject.get("subject");
	            JSONArray emailData = (JSONArray) jsonObject.get("data");

	            Iterator<String> iterator1 = emailID.iterator();
	            while (iterator1.hasNext()) 
	            {
	            	eid.add(iterator1.next());
	            }
	            
	            Iterator<String> iterator2 = emailHeader.iterator();
	            while (iterator2.hasNext()) 
	            {
	            	eheader.add(iterator2.next());
	            }
	            
	            Iterator<String> iterator3 = emailSubject.iterator();
	            while (iterator3.hasNext()) 
	            {
	            	esubject.add(iterator3.next());
	            }
	            
	            Iterator<String> iterator4 = emailData.iterator();
	            while (iterator4.hasNext()) 
	            {
	            	edata.add(iterator4.next());
	            }

	        }
	        catch (Exception e) 
	        {
	            e.printStackTrace();
	        }
			
			//now we add data from new email message to the arraylist:
			eid.add(id);
			eheader.add(header);
			esubject.add(subject);
			edata.add(data);
			
			//finally we save the updated data [it replaces exisitng file!]:
			JSONObject obj = new JSONObject();
			
			JSONArray eID = new JSONArray();
			eID.addAll(eid);
			obj.put("id", eID);
			
			JSONArray eHeader = new JSONArray();
			eHeader.addAll(eheader);
			obj.put("header", eHeader);
			
			JSONArray eSubject = new JSONArray();
			eSubject.addAll(esubject);
			obj.put("subject", eSubject);
			
			JSONArray eData = new JSONArray();
			eData.addAll(edata);
			obj.put("data", eData);
			
			try (FileWriter file = new FileWriter("StandardEmailDatabase.txt")) 
			{
				file.write(obj.toJSONString());
				String message = "A new Standard Email was successfully created! ID: "+id+" Address: "+header+" Subject: "+subject+" Data: "+data;
				JOptionPane.showMessageDialog(null, message);
				EmailViewer.standard_email_run_viewer();
			}
			
			catch (Exception e) 
			{
		        e.printStackTrace();
		    }
			
			//run to check if there are any URLs with this message:	
			this.fileURLWriter();
		}
		
		//save SIR email message to the database:
		@SuppressWarnings("unchecked")
		public void fileSIREmailWriter()
		{	
			ArrayList<String> eid = new ArrayList<>();
			ArrayList<String> eheader = new ArrayList<>();
			ArrayList<String> esubject = new ArrayList<>();
			ArrayList<String> edata = new ArrayList<>();
			ArrayList<String> esir = new ArrayList<>();
			ArrayList<String> esort = new ArrayList<>();
			String[] sirList = {"Theft", "Staff Attack", "ATM Theft", "Raid", "Customer Attack", "Staff Attack", "Bomb Threat", "Terrorism", "Suspicious Incident", "Intelligence", "Cash Loss"};
					
			JSONParser parser = new JSONParser();
			//an empty file was placed to ensure it works, do not remove!
			//first read existing database to fill the arraylists with existing data
			try 
			{
				Object obj = parser.parse(new FileReader("SIREmailDatabase.txt"));
				
				JSONObject jsonObject = (JSONObject) obj;
			    JSONArray emailID = (JSONArray) jsonObject.get("id");
			    JSONArray emailHeader = (JSONArray) jsonObject.get("header");
			    JSONArray emailSubject = (JSONArray) jsonObject.get("subject");
			    JSONArray emailData = (JSONArray) jsonObject.get("data");
			    JSONArray emailSort = (JSONArray) jsonObject.get("sort");
			    JSONArray emailSIR = (JSONArray) jsonObject.get("sir");
			            
			    Iterator<String> iterator1 = emailID.iterator();
			    while (iterator1.hasNext()) 
			    {
			    	eid.add(iterator1.next());
			    }
			            
			    Iterator<String> iterator2 = emailHeader.iterator();
			    while (iterator2.hasNext()) 
			    {
			        eheader.add(iterator2.next());
			    }
			            
			    Iterator<String> iterator3 = emailSubject.iterator();
			    while (iterator3.hasNext()) 
			    {
			        esubject.add(iterator3.next());
			    }
			            
			    Iterator<String> iterator4 = emailData.iterator();
			    while (iterator4.hasNext()) 
			    {
			        edata.add(iterator4.next());
			    }			            
			            
			    Iterator<String> iterator5 = emailSort.iterator();
			    while (iterator5.hasNext()) 
			    {
			       	esort.add(iterator5.next());
			    }
			    
			    Iterator<String> iterator6 = emailSIR.iterator();
			    while (iterator6.hasNext()) 
			    {
			    	esir.add(iterator6.next());
			    }

			}
			catch (Exception e) 
			{
				e.printStackTrace();
			}
					
			//now we add data from new email message to the arraylist:
			eid.add(id);
			eheader.add(header);
			esubject.add(subject);
			edata.add(data);
			esort.add(sortcode);
					
			//check for the type of SIR incident from list:
			String sir_name ="";
					
			for(int i =0; i<sir_type.length; i++)
			{
				if(sir_type[i]==1)
				{
					sir_name = sirList[i];
				}
			}
			esir.add(sir_name);
					
			//finally we save the updated data [it replaces exisitng file!]:
			JSONObject obj = new JSONObject();
					
			JSONArray eID = new JSONArray();
			eID.addAll(eid);
			obj.put("id", eID);
					
			JSONArray eHeader = new JSONArray();
			eHeader.addAll(eheader);
			obj.put("header", eHeader);
					
			JSONArray eSubject = new JSONArray();
			eSubject.addAll(esubject);
			obj.put("subject", eSubject);
					
			JSONArray eData = new JSONArray();
			eData.addAll(edata);
			obj.put("data", eData);
					
			JSONArray eSort = new JSONArray();
			eSort.addAll(esort);
			obj.put("sort", eSort);
					
			JSONArray eSIR = new JSONArray();
			eSIR.addAll(esir);
			obj.put("sir", eSIR);
					
					
			try (FileWriter file = new FileWriter("SIREmailDatabase.txt")) 
			{
				file.write(obj.toJSONString());
				String message = "A new SIR Email was successfully created! ID: "+id+" Address: "+header+" Subject: "+subject+" Data: "+data;
				JOptionPane.showMessageDialog(null, message);
				EmailViewer.sir_email_run_viewer();
			}
					
			catch (Exception e) 
			{
		        e.printStackTrace();
			}
			//run to check if there are any URLs with this message:		
			this.fileURLWriter();
	}
	
}
