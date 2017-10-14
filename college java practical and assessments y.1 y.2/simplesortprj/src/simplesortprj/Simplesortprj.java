package simplesortprj;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;

public class Simplesortprj 
{

    public static void main(String[] args) 
    {
        int[] number = new int[500];
        int data;
        int index=0;
        int temp;
        
        
        try
        {
            File myFile = new File("Assessdata2.txt");
            FileReader fr = new FileReader(myFile);
            BufferedReader br = new BufferedReader(fr);
            
            String line = null;
            
            while((line = br.readLine())!=null)
            {
                System.out.println(line);
                data=Integer.parseInt(line.toString());
                number[index]=data;
                index++;
               
            }
            
            System.out.println();
            System.out.println("Finished reading File");
            
            br.close();
        }
        catch(IOException e)
        {
            System.out.println("Sorry error reading file");    
        }
        
        
        for (int k=0; k<number.length-1; k++)
        {
            for(int j=1; j<number[j]; j++)
            {
                if(number[j-1]>number[j])
                {
                    temp=number[j-1];
                    number[j-1]=number[j];
                    number[j]=temp;
                }
               
            }
                
        }
        
        for(int m=0; m<number.length; m++)
        {
            System.out.println(number[m]);
        }
        
    }
    
    
}
