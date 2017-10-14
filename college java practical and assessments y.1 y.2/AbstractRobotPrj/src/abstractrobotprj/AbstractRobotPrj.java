package abstractrobotprj;
 
import becker.robots.*;
import java.util.Scanner;


public class AbstractRobotPrj
{
    

    
    public static void main(String[] args)
    {
        
        City ayr = new City();
        
        //extended class robotec
        //RobotEC karel = new RobotEC(ayr,3,4, Direction.EAST);
        
       BikeBot biker = new BikeBot(ayr, 3, 4, Direction.EAST);
       CarBot car = new CarBot(ayr, 5, 4, Direction.EAST);
                
        Scanner keyboard = new Scanner(System.in);
        
        boolean game=true;
        
            while(game==TRUE)
                {
                    

                }
       
    }
    
}