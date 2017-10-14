package interfaceclassexample;

public class MyClass implements InterfaceExample, Runnable
{

    @Override
    public void add() 
    {
        System.out.println("added");
    }

    @Override
    public String mystring()
    {
        return "hello";
    }
    
    public void run()
    {
        System.out.println("thread here lol");
    }
    
}
