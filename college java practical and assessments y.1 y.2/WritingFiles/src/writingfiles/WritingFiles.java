//tokens read write to file 
package writingfiles;

import java.io.*;
import java.util.StringTokenizer;

public class WritingFiles 
{

    public static void main(String[] args) 
    {
        File myfile2 = new File("tam2.txt");
        
        int number; 
        int total=0;
        String line = null;
        
                try
            {
                FileReader fr = new FileReader(myfile2);
                BufferedReader br = new BufferedReader(fr);
                
                
                StringTokenizer st = new StringTokenizer(line, ",");
                
                while(st.hasMoreTokens())
                {
                    number = Integer.parseInt(st.nextToken());
                    total = total + number;
                }
                
                System.out.println("Total = "+total+",");
                total = 0;
                
                br.close();
            }
                
        catch(IOException e)
            {
                System.out.println("An error has occured");
            }
    }
    
}
