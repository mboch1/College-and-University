
package stocktracker;

/**
 *
 * @author mb
 */
public class StockTracker 
{

  
    public static void main(String[] args) 
    {
     Subject subject = new Subject();
     new EuroObserver(subject); 
     
     System.out.println("Update 1  : ");	
     subject.setState(0.92);
     System.out.println();
      
     System.out.println("Update 2  : ");
     subject.setState(0.87);
     System.out.println();
     
     System.out.println("Update 3  : ");
     subject.setState(1.12);
     System.out.println();
     
    }
    
}
