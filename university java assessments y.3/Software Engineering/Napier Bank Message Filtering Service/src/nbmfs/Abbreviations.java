//created on 01/11/2016 by student 40270585
package nbmfs;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

public class Abbreviations 
{
	
	public ArrayList<String> abbrv = new ArrayList<>();
	public ArrayList<String> expanded = new ArrayList<>();
	
	//this method returns abbreviations as an arraylist
	public ArrayList<String> return_abbreviation()
	{
		
		BufferedReader br = null;
		
		try 
		{	
			String currentLine;
			
			br = new BufferedReader(new FileReader("textwords.csv"));
			
			while ((currentLine = br.readLine()) != null) 
			{
				String[] line = currentLine.split(",");
				abbrv.add(line[0]);
			}
			
			br.close();
		} 
		
		catch(IOException e) 
		{
			e.printStackTrace();
		} 
		
		return abbrv;
	}
	
	//this method returns extended abbreviations as an arraylist
	public ArrayList<String> return_expanded()
	{
		BufferedReader br = null;
		
		try 
		{	
			String currentLine;
			
			br = new BufferedReader(new FileReader("textwords.csv"));
			
			while ((currentLine = br.readLine()) != null) 
			{
				String[] line = currentLine.split(",");
				expanded.add(line[1]);
			}
			
			br.close();
		} 
		
		catch(IOException e) 
		{
			e.printStackTrace();
		} 
		
		return expanded;
	}	
	

}
