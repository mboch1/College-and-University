package sortingpostcodesusa;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.StringTokenizer;
import java.util.regex.*;

/**
 *
 * @author ec1401916
 */

public class ReadTokens 
{
    //global variables
    private ArrayList<String> addresses = new ArrayList<>();
    private ArrayList<String> valid = new ArrayList<>();    
    private ArrayList<String> invalid = new ArrayList<>();
    
    private ArrayList<String> ListOfAddresses = new ArrayList<>();
    
    
    //this method reads tokens from the txt file and puts them to the arraylist
    public ArrayList<String> reading(ArrayList<String> addresses)
    {
        try
        {
            File myFile = new File("postcodes1.txt");
            FileReader fr = new FileReader(myFile);
            BufferedReader br = new BufferedReader(fr);
            String line = null;
          
            while((line=br.readLine())!=null)
            {
                    
                StringTokenizer st = new StringTokenizer(line,"");
                int tokens = st.countTokens();
                
                while(st.hasMoreTokens())
                {                    
                    addresses.add(st.nextToken());                   
                }                                                        

            }
                    
                    
            br.close();     
        }    
        
        catch(IOException e)
            {
                System.out.println("An unknown IO Error has occured or file not found!");
            }   
        
        return addresses;
    }
    
    
    public ArrayList<String> validate (ArrayList<String> addressesread, ArrayList<String> valid, ArrayList<String> invalid)
    {
        
        ArrayList<String> valid5 = new ArrayList<>();    
    
        ArrayList<String> invalid5 = new ArrayList<>();    
        
        //a single string length 5 with pattern instruction NNNNN
        String strl5 ="^\\d{5}$";
        
        
        String tester=null;
        int strlength=0;
        
        //do check length function here
        
        for(int i=0; i<addressesread.size();i++)
        {
            tester=addressesread.get(i);
            
            if(tester.length()==5)
            {
        //if strlength = 5 do this:
            Pattern p5 = Pattern.compile(strl5);
        
        //checks for given pattern if it matches the string inside matcher
            Matcher m5 = p5.matcher(tester);
        
        //if pattern matches the matcher it will return 1
            boolean check = m5.matches();
        //forward string to the valid arraylist and get next string
                if(check==true)
                {
                    valid5.add(tester);
                }
                else
                {
                    invalid5.add(tester);
                }
           
            }
        
        System.out.println("Valid 5 characters long(with whitespace) addresses: ");
        System.out.println(valid5);
        
        System.out.println("Invalid 5 characters long(with whitespace) addresses: ");
        System.out.println(invalid5);
        System.out.println("Other invalid strings: ");
        System.out.println(invalid);
        System.out.println("");
        
        valid.addAll(valid5);

        System.out.println("These are all valid addresses:");
        System.out.println(valid);
        
        return null;
    }
        return null;
    }
}