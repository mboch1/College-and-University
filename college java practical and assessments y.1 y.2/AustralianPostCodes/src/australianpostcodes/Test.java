package australianpostcodes;

public class Test 
{
    int  postcode2;
    
    Test(int postcode)
    {
        postcode2 = postcode;
    }
    
    public int Check()
    {
         if((postcode2>=1000&&postcode2<=1999)||(postcode2>=2000&&postcode2<=2599)||(postcode2>=2619&&postcode2<=2898)||(postcode2>=2921&&postcode2<=2999))
        {            
            
            System.out.println("New South Wales"); 
        }
        else if((postcode2>=200&&postcode2<=299)||(postcode2>=2600&&postcode2<=2618)||(postcode2>=2900&&postcode2<=2920))
        {
            
            System.out.println("Australian Capital Territory");
        }
        else if((postcode2>=3000&&postcode2<=3999)||(postcode2>=8000&&postcode2<=8999))
        {
            
            System.out.println("Victoria");
        }
        else if((postcode2>=4000&&postcode2<=4999)||(postcode2>=9000&&postcode2<=9999))
        {
            
            System.out.println("Queensland");
        }        
        else if((postcode2>=5000&&postcode2<=5799)||(postcode2>=5800&&postcode2<=5999))
        {
            
            System.out.println("South Australia");
        }
        else if((postcode2>=6000&&postcode2<=6797)||(postcode2>=6800&&postcode2<=6999))
        {
            
            System.out.println("Western Australia");
        }        
        else if((postcode2>=7000&&postcode2<=7799)||(postcode2>=7800&&postcode2<=7999))
        {
            
            System.out.println("Tasmania");
        }
        else if((postcode2>=800&&postcode2<=899)||(postcode2>=900&&postcode2<=999))
        {
            
            System.out.println("Northern Territory");
        }
        else
        {
            System.out.println("It's not a valid postcode!");
        }
        
        return postcode2;
    }
    
}
