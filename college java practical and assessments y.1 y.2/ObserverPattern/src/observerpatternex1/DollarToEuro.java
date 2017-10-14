package observerpatternex1;

import java.text.DecimalFormat;
import java.text.NumberFormat;


//this is our observer 
public class DollarToEuro extends Observer
{
    private final double dollar = 500;
    
    public DollarToEuro(Subject subject)
    {
      this.subject = subject;
      this.subject.attach(this);
    }

   @Override
   public void update() 
    {
        NumberFormat nf = new DecimalFormat("%0.00");
        System.out.println("New stock value : "+nf.format(subject.getState()*dollar));
    }
}
