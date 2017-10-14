package sortingpostcodes;

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
        
        ArrayList<String> valid6 = new ArrayList<>();    
        ArrayList<String> valid7 = new ArrayList<>();    
        ArrayList<String> valid8 = new ArrayList<>();    
        
        ArrayList<String> invalid6 = new ArrayList<>();    
        ArrayList<String> invalid7 = new ArrayList<>();    
        ArrayList<String> invalid8 = new ArrayList<>();        
        //a single string length 6 with pattern instruction AN_NAA
        String strl6 ="^[^QVX[^0-9]][0-9][\\s][0-9][A-Z[^CIKMOV]]{2}$";
        //a single string length 7 with patterns: ANN_NAA, AAN_NAA, ANA_NAA,
        String strl7 ="^[A-Z[^QVX]][0-9[A-Z[^IJZ]]][A-H[JKSTUW]0-9][\\s][0-9][A-Z[^CIKMOV]]{2}$";
        //a single string length 8 with patterns: AANN_NAA, AANA_NAA
        String strl8 ="^[A-Z[^QVX]][A-Z[^IJZ]][0-9][0-9[ABEHMNPRVWXY]][\\s][0-9][A-Z[^CIKMOV]]{2}$";
        
        //a single string from our arraylist
        String tester=null;
        int strlength=0;
        
        //do check length function here
        
        for(int i=0; i<addressesread.size();i++)
        {
            tester=addressesread.get(i);
            
            if(tester.length()==6)
            {
        //if strlength = 6 do this:
            Pattern p6 = Pattern.compile(strl6);
        
        //checks for given pattern if it matches the string inside matcher
            Matcher m6 = p6.matcher(tester);
        
        //if pattern matches the matcher it will return 1
            boolean check = m6.matches();
        //forward string to the valid arraylist and get next string
                if(check==true)
                {
                    valid6.add(tester);
                }
                else
                {
                    invalid6.add(tester);
                }
           
            }
           
            
            else if(tester.length()==7)
            {
        //if strlength = 7 do this:
            Pattern p7 = Pattern.compile(strl7);
        
        //checks for given pattern if it matches the string inside matcher
            Matcher m7 = p7.matcher(tester);
        
        //if pattern matches the matcher it will return 1
            boolean check = m7.matches();
        //forward string to the valid arraylist and get next string
                if(check==true)
                {
                    valid7.add(tester);
                }
                else
                {
                    invalid7.add(tester);
                }           
            }         
            
            else if(tester.length()==8)
            {
        //if strlength = 8 do this:
            Pattern p8 = Pattern.compile(strl8);
        
        //checks for given pattern if it matches the string inside matcher
            Matcher m8 = p8.matcher(tester);
        
        //if pattern matches the matcher it will return 1
            boolean check = m8.matches();
        //forward string to the valid arraylist and get next string
                if(check==true)
                {
                    valid8.add(tester);
                }
                else
                {
                    invalid8.add(tester);
                }           
            }
            else if(tester.length()>8||tester.length()<6)
            {
                invalid.add(tester);
            }
            else
            {
                invalid.add(tester);    
            }           
        }
        
        
        System.out.println("Valid 6 characters long(with whitespace) addresses: ");
        System.out.println(valid6);
        System.out.println("Valid 7 characters long(with whitespace) addresses: ");
        System.out.println(valid7);
        System.out.println("Valid 8 characters long(with whitespace) addresses: ");
        System.out.println(valid8);
        System.out.println("");
        
        System.out.println("Invalid 6 characters long(with whitespace) addresses: ");
        System.out.println(invalid6);
        System.out.println("Invalid 7 characters long(with whitespace) addresses: ");
        System.out.println(invalid7);
        System.out.println("Invalid 8 characters long(with whitespace) addresses: ");
        System.out.println(invalid8);
        System.out.println("Other invalid strings: ");
        System.out.println(invalid);
        System.out.println("");
        valid.addAll(valid6);
        valid.addAll(valid7);
        valid.addAll(valid8);
        
        System.out.println("These are all valid addresses:");
        System.out.println(valid);
        
        return null;
    }
}