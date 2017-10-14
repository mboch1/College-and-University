package sortingpostcodes;

import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author ec1401916
 */
public class SortingPostcodes 
{
    public static void main(String[] args) 
    {
        //global variables
        ArrayList<String> addressesread = new ArrayList<>();
        ArrayList<String> state_names = new ArrayList<>();
        ArrayList<String> state_numbers = new ArrayList<>();
        
        System.out.println("This is program sorting US post codes.");
        System.out.println("Post codes in USA are 5 digit numbers.");
        System.out.println("Program will find strings separated by ',' in a given file.");
        System.out.println("Second position (token) is a candidate for postal code to be validated.");
        System.out.println("Token passess for a valid postal code if it contains 5 digits which have any non numeric or alphabetic characters at the position 0 and 6 in a string (start and end of token string)");
        ReadTokens readem = new ReadTokens();
        System.out.println("");
        
        readem.fillstates(state_names);
        
        //read addresses from the txt file
        readem.reading(addressesread);

        //readem.validator(addressesread);
        
        System.out.println("These are addresses to be validated: ");
        System.out.println(addressesread);
        System.out.println("");
        
        int end=4;
        
            while(end!=0)
        {
            System.out.println("MENU:");
            System.out.println("Press 1 and ENTER to validate a text file with postal codes.");
            System.out.println("Press 2 and ENTER to enter single postal code validation.");
            System.out.println("Press 0 and ENTER to finish.");
            
            Scanner sc = new Scanner(System.in);
            end = sc.nextInt();
            
            switch (end) 
            {
                case 1:
                    readem.validate(addressesread, state_names);
                    break;
                case 2:
                    readem.single();
                    break;
                case 0:
                    System.out.println("Program will now exit.");
                    break;
                default:
                    break;
            }
        }
    }    
}
