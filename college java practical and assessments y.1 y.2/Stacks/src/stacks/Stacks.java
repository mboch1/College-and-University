/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package stacks;

/**
 *
 * @author dwalker
 */
import java.util.*;

public class Stacks 
{

    
    public static void main(String[] args) 
    {
       
        Stack<Integer> s = new Stack<Integer>();
        s.push(42);
        s.push(23);
        s.push(5);
        s.push(43);
        
        System.out.println("Maximum " + max(s));
        
         while(!s.isEmpty())
       {
         System.out.println(s.pop());
       }
        
        
    }
    
    public static int max(Stack<Integer> s)
    {
       Stack<Integer> backup = new Stack<Integer>();

        int maxValue = s.pop();
        backup.push(maxValue);
        
       while(!s.isEmpty())
       {
          int next = s.pop(); 
          backup.push(next);
          maxValue = Math.max(maxValue,next);
       }
       
        while(!backup.isEmpty())
        {
            s.push(backup.pop());
        }
       
       return maxValue;
    }
    
}
