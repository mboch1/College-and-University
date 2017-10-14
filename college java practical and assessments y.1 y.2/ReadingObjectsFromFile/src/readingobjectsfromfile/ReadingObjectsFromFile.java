package readingobjectsfromfile;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.FileInputStream;
import java.io.ObjectInputStream;
import java.lang.ClassNotFoundException;

public class ReadingObjectsFromFile 
{
    private static final long serialVersionUID = 2L;

    public static void main(String[] args)
    {

       System.out.println("Reading Objects");
        
       File myFile = new File("people2.dat");
       
       
      try(
              FileInputStream fi = 
              new FileInputStream(myFile)
          )
      {
         ObjectInputStream os = 
              new ObjectInputStream(fi);
         
         Person[]  person =
                 (Person[])os.readObject();
         
         
      os.close();
      
      for(Person p : person)
       {
        System.out.println(p);  
       } 
      
      }
        catch(FileNotFoundException e)
        {
        }
        catch(IOException | ClassNotFoundException e)
        {
        
        }
    }
    
}
