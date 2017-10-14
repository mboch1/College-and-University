package sortingpostcodesusa;

import java.util.ArrayList;


public class SortingPostcodesUSA {

    public static void main(String[] args) 
    {
        //global variables
        ArrayList<String> addressesread = new ArrayList<>();
        ArrayList<String> valid = new ArrayList<>();
        ArrayList<String> invalid = new ArrayList<>();
        
        System.out.println("This is program sorting UK post codes.");
        ReadTokens readem = new ReadTokens();
        System.out.println("");
        
        //read addresses from the txt file
        readem.reading(addressesread);
        
        
        
        //readem.validator(addressesread);
        
        System.out.println("These are addresses to be validated: ");
        System.out.println(addressesread);
        System.out.println("");
        
        //begin validation
        readem.validate(addressesread, valid, invalid);
        
        
    }    
}
