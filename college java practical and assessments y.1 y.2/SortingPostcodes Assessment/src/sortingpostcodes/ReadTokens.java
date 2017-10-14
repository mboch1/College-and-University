package sortingpostcodes;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;
import java.util.StringTokenizer;
import java.util.regex.*;

/**
 *
 * @author ec1401916
 */

public class ReadTokens 
{
    //global variables
    private ArrayList<String> addresses1 = new ArrayList<>();    
    
    
    public ArrayList<String> fillstates(ArrayList<String> state_names)
    {
        try
        {
            File myFile = new File("ListOfStates.txt");
            FileReader fr2 = new FileReader(myFile);
            BufferedReader br2 = new BufferedReader(fr2);
            String line = null;
            
            while((line=br2.readLine())!=null)
            {
                    
                StringTokenizer st = new StringTokenizer(line,"");
                int tokens = st.countTokens();
                
                while(st.hasMoreTokens())
                {                    
                        state_names.add(st.nextToken());
                }                                                        

            }
            
            br2.close();     
        }    
        
        catch(IOException e)
            {
                System.out.println("An unknown IO Error has occured or file not found!");
            }   
        return state_names;
    }
    
    
    
    
    
    
    //this method reads tokens from the txt file and puts them to the arraylist
    public ArrayList<String> reading(ArrayList<String> addresses1)
    {
        try
        {
            File myFile = new File("CleanCodes.txt");
            FileReader fr = new FileReader(myFile);
            BufferedReader br = new BufferedReader(fr);
            String line = null;
            
            while((line=br.readLine())!=null)
            {
                    
                StringTokenizer st = new StringTokenizer(line,",");
                int tokens = st.countTokens();
                
                while(st.hasMoreTokens())
                {                    
                    //NEXT TOKEN
                    String str2="";
                    
                    for(int i=0;i<3;i++)
                    {    
                        String sub2 = st.nextToken();
                        
                        for(int j=1;j<sub2.length()-1;j++)
                        {
                            str2 = str2+sub2.charAt(j);
                        }          
                        
                        if(i==0||i==1)
                        {
                            str2 = str2+' ';
                        }
                    }
                    addresses1.add(str2); 
                }                                                        

            }
            
            br.close();     
        }    
        
        catch(IOException e)
            {
                System.out.println("An unknown IO Error has occured or file not found!");
            }   
        
        return addresses1;
  
    }

   
  
public ArrayList<String> validate (ArrayList<String> addressesread,  ArrayList<String> state_names)
    {            
        ArrayList<String> validated = new ArrayList();
        ArrayList<String> invalid = new ArrayList();        
        ArrayList<String> temp = new ArrayList();
        
        temp.addAll(addressesread);
        
        //pattern for valid string
        String strl5 ="[0-9][0-9][ ][0-9][0-9][0-9][0-9][0-9][ ][A-Z][A-Z]";       

        //start the search here
        for(int i=0; i<temp.size(); i++)
        {
            
        String checker = temp.get(i);
        
            
        Pattern p = Pattern.compile(strl5);
        Matcher m = p.matcher(checker);
        boolean b = m.matches();
        
        if(b==true)
        {
            validated.add(temp.get(i));
        }
        else
        {
            invalid.add(temp.get(i));
        }
        
        }
        
        System.out.println("Invalid addresses are: ");
        System.out.println(invalid);
        
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! tu kontynuuj

        
        for(int z=0; z<validated.size(); z++)
        {
            String temp3 = "";
            String temp1 = validated.get(z);
            
            for(int k=0; k<2; k++)
            {
                temp3 = temp1;gcfghfghfd
            }
        }
        
        
        System.out.println("Valid addresses are: ");
        System.out.println(validated);
        
        return addressesread;
    }

    void single() 
    {      
        String strl5 ="[0-9][0-9][ ][0-9][0-9][0-9][0-9][0-9][ ][A-Z][A-Z]";       

        Scanner sc = new Scanner(System.in);
        String input = sc.nextLine();        
        
        Pattern p = Pattern.compile(strl5);
        Matcher m = p.matcher(input);
        boolean b = m.matches();
        
        if(b==true)
        {
            System.out.println("This is the right post code!");
        }
        else
        {
            System.out.println("This is the wrong post code!");
        }
        
    }
}