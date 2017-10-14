package australianpostcodes;

import java.util.Scanner;

/**
 *
 * @author ec1401916
 */
public class AustralianPostCodes 
{

    public static void main(String[] args) 
    {
        int postcode = 0;


        System.out.println("Give a postcode to validate: ");
        Scanner sc = new Scanner(System.in);
        postcode = sc.nextInt();
        
        Test test = new Test(postcode);
        test.Check();


    }
    
}
