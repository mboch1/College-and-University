
package stocktracker;

/**
 *
 * @author mb
 */
import java.text.NumberFormat;
import java.text.DecimalFormat;

public class EuroObserver extends Observer
{
  private double dollar = 500;  
  
  public EuroObserver(Subject subject)
   {
      this.subject = subject;
      this.subject.attach(this);
   }

   @Override
   public void update() 
   {
      NumberFormat nf = new DecimalFormat("#0.00"); 
      System.out.println( "New stock value  : " + nf.format(subject.getState()*dollar)); 
   } 
    
    
}
