
package arrayofintegerprj;

/**
 *
 * @author duncanwalker
 */
public class ArrayOfIntegerPrj 
{

   
    public static void main(String[] args) 
    {
       String str;
       ArrayStack st = new ArrayStack(5);
       str = "adding 3 4 5 2 7 on to stack";
       System.out.println(str);
       
       
       st.push(3);
       st.push(4);
       st.push(5);
       st.push(2);
       st.push(7);
       st.push(9);
        
       System.out.println("Value at top of stack "+st.peek());
       
       st.pop();
       st.pop();
       
       System.out.println("Value at top of stack "+st.peek());
       
       while(!st.empty())
        {
           System.out.println(st.pop()+" ");   
        }
       
       
    }
    
}
