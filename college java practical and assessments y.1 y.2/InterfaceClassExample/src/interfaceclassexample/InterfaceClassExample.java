package interfaceclassexample;

public class InterfaceClassExample 
{

   
    public static void main(String[] args)
    {
       // Unfinished un = new Unfinished();
        
        //abstract class extended from unfinished - finishme 
        FinishMe fm = new FinishMe();
        
        fm.stopping();
        
        
        //interface implemented from interface example explained by myclass
        MyClass mc = new MyClass();
        
        mc.run();
        
        
        
    }
    
}
