package stacktask3;


import java.io.*;
import java.util.Stack;
import java.util.StringTokenizer;


public class StackTask3 
{
    public static void main(String[] args)
    {
        File myFile = new File("tokendata.txt");
        
        int number;
        
        //general stack
        Stack<Integer> stack0 = new Stack<>();  
        //stack of evens
        Stack<Integer> stack1 = new Stack<>();
        //stack of odds
        Stack<Integer> stack2 = new Stack<>();
        
        // read tokens here
        
            try
        {
            FileReader fr = new FileReader(myFile);
            BufferedReader br = new BufferedReader(fr);
                
            String line = ""; 
                
                
            while((line=br.readLine())!=null)
                {
                
                
                    StringTokenizer st = new StringTokenizer(line, ",");

                    while(st.hasMoreTokens())
                        {
                            number = Integer.parseInt(st.nextToken());
                            stack0.push(number);
                        }
                
                }
            
            br.close();     
        }
            
            
           
        catch(IOException e)
            {
                System.out.println("An error has occured");
            }
                
                 
        //display all the tokens on general stack
        System.out.println("General stack: "+stack0);
                
                
                while(!stack0.empty())
            {
                //if stack element is div by 2 add it to the stack of evens
                if(stack0.peek()%2==0)
                {   
                    if(!stack0.empty())
                    {
                        stack1.push(stack0.pop());
                    }
                }
                //if stack element is not div by 2 add it to the stack of odds
                else if(stack0.peek()%2==1)
                {
                    if(!stack0.empty())
                    {
                        stack2.push(stack0.pop());
                    }
                }
            }
                
            //display results     
            System.out.println("Stack of evens: "+stack1);
            System.out.println("Stack of odds: "+ stack2);
                
            
    }
    
}
