package writeobjects;

import java.io.FileOutputStream;
import java.io.ObjectOutputStream;
import java.io.FileNotFoundException;
import java.io.IOException;

public class WriteObjects 
{
  private static final long serialVersionUID = 1L;
    
    public static void main(String[] args) 
    {
      System.out.println("Writing Objects");
      
     Person[] people = { new Person(1,"Sue"),
                         new Person(2,"Juan"),
                         new Person(3,"Ying")
                       };
      
      
      try(FileOutputStream fs = 
              new FileOutputStream("people2.dat"))
       {
        ObjectOutputStream os = 
                new ObjectOutputStream(fs); 
        
        os.writeObject(people);
       
        
        os.close();
        System.out.println("Objects sent to disk");
       }
       catch (FileNotFoundException e)   
        {
          e.printStackTrace();
        }
       catch(IOException e)
        {
          e.printStackTrace();
        }
    }
    
}
