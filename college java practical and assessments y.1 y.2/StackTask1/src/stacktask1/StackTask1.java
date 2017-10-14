package stacktask1;

import java.util.Stack;




public class StackTask1 
{

    public static void main(String[] args) 
    {
        //temporary stack use (pop)
        Stack<String> st2 = new Stack<>();
        //stack of cars
        Stack<String> st = new Stack<>();
        //stack temp
        Stack<String> st3 = new Stack<>();
        //string to swap current element use (peek)
        String temp = new String();
        
        st.push("1 Ford Model T");
        st.push("2 Corvette Sting Ray");
        st.push("3 Camaro");
        st.push("4 Tucker");
        st.push("5 Volkswagen");
        st.push("6 Porsche 911");
        st.push("7 Maserati 3500");
        st.push("8 Ford GT40");
        st.push("9 Aston Marten DB2");
        
        while(st.empty()==false)
        {
            temp = st.peek();
            System.out.println("Cars in rearranged order: "+ temp);
            st2.add(st.pop());    
        }
        
       String tempstring1 = st2.pop();
       String tempstring2 = st2.pop();
       
       System.out.println("String1 "+tempstring1);
       System.out.println("String2 "+tempstring2);
       
       st.push(tempstring2);
       st.push(tempstring1);
        
        while(st2.empty()==false)
        {
            st.push(st2.pop());
        }
        while(st.empty()==false)
        {
            st3.push(st.pop());
            System.out.println("Cars in new order: "+st3.peek());
        }
    }
    
}
