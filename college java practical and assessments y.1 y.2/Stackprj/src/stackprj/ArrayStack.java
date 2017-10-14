package stackprj;

public class ArrayStack implements MyStackInterface
{
    private int[] s;
    private int top;
    
    
    public ArrayStack(int capacity)
    {
        s = new int[capacity];
        top = 0;
    }
    
    
    @Override
    public boolean empty() 
    {
        return  top==0;
    }

    @Override
    public void push(int x) 
    {
        if(top==s.length)
        {
            System.out.println("Array is full.");
        }
        
        else
        {
            s[top] =x;
            top++;
        }
    }

    @Override
    public int pop() 
    {
        if(empty())
        {
            //throw new EmptyStackException();
        }
        else
        {
            top--;
            return s[top];
        }
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
    }

    @Override
    public int size() 
    {
        return top-1;
    }
    
}
