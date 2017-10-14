package savingobjectstofile;

import java.io.*;

public class SavingObjectsToFile 
{


    public static void main(String[] args) 
    {
        System.out.println("Writing Objects");
        
        Person Juan = new Person(125, "Juan");
        Person Sue = new Person(980, "Sue");
        
        System.out.println(Juan);
        System.out.println(Sue);
        
        try
        {
            FileOutputStream fs = new FileOutputStream("people2.dat");
            ObjectOutputStream os = new ObjectOutputStream(fs);
            
            os.writeObject(Juan);
            os.writeObject(Sue);
            
         
            os.close();
            System.out.println("Objects sent to disk");
            
        }
        catch(FileNotFoundException e)
        {
            e.printStackTrace();
        }
        
        catch(IOException e)
        {
            e.printStackTrace();
        }
        
        
    }
    
}
