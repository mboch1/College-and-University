
package arrayofintegerprj;

/**
 *
 * @author duncanwalker
 */
public class ArrayStack implements MyStackInterface
{
   private int[] s;
   private int top;
    
   
   public  ArrayStack(int capacity)
   {
     s = new int[capacity];
     top = 0;
   }  
   
   
   
    @Override
    public boolean empty() 
    {
       return top==0; 
        
       // throw new UnsupportedOperationException("Not supported yet."); 
    }

    @Override
    public void push(int x) 
    {
      if(top==s.length)
       {
         System.out.println("Array is full");  
       }
      else
      {
        s[top] = x;
        top++;
      }
        
       // throw new UnsupportedOperationException("Not supported yet."); 
    }

    @Override
    public int pop() 
    {
      if(empty()) 
       {
           return 0; 
        //throw new EmptyStackException();  
       }
      else
      {
       top--;
       return s[top];
      }
      
        
       // throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public int peek() 
    {
      if(empty())
       {
         return 0;  
       }
      else
      {
       return s[top-1];   
      } 
       // throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public int size() 
    {
     if(empty())
      {
        return 0;  
      }
      else
      {
       return top-1;   
      } 
        
      
//throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
   

    
    
    
}
