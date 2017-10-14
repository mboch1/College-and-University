/*
 * created on 01/11/2016 student id: 40270585
 * handles saving user input to the json file type
 * version 2 - added different file names
 */
package nbmfs;

import java.io.FileReader;
import java.io.FileWriter;
import java.util.ArrayList;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

public class JSONFileHandler 
{
	public JSONFileHandler(){
		
	};
	
	//write message data to file
	@SuppressWarnings("unchecked")
	public void fileWriter(String msgID, String msgHeader, String msgData, String msgSubject)
	{
		String id = msgID;
		String head = msgHeader;
		String data = msgData; 
		String subject = msgSubject;
		
		JSONObject obj = new JSONObject();
		
		obj.put("ID", id);
		obj.put("Header", head);
		obj.put("Data", data);
		obj.put("Subject", subject);
 
		try (FileWriter file = new FileWriter(id+"input.txt")) 
		{
			file.write(obj.toJSONString());
		}
		
		catch (Exception e) 
		{
	        e.printStackTrace();
	        return;
	    }
	}
	
	//read json data from a file, requires message ID to read, returns an arraylist [id,header,data,subject]
	public ArrayList<String> fileReader(String msgID)
	{
		ArrayList<String> message_read = new ArrayList<>();
		
		JSONParser parser = new JSONParser();
		 
        try {
        	
            Object obj = parser.parse(new FileReader(msgID+".txt"));
            
            JSONObject jsonObject = (JSONObject) obj;
            String id = (String) jsonObject.get("ID");
            String head = (String) jsonObject.get("Header");
            String data = (String) jsonObject.get("Data");
            String subject = (String) jsonObject.get("Subject");
            
            message_read.add(id);
            message_read.add(head);
            message_read.add(data);
            message_read.add(subject);
        }
        
        catch (Exception e) 
        {
            e.printStackTrace();
            return null;
        }
		return message_read;
	}
}
