package stackandqueuesassessment;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;
import java.util.Set;
import java.util.Stack;
import java.util.StringTokenizer;
import java.util.concurrent.ArrayBlockingQueue;
import java.util.concurrent.BlockingQueue;

/**
 *
 * @author ec1401916
 */
public class Sorting 
{
        //here we will put our cargo to be loaded to the pods    
        ArrayList<String> stacking = new ArrayList<>();
        //global variables to be used later
        //pod 1 and 2 with cargo loaded
        private Stack<String> pod1 = new Stack<>();  
        private Stack<String> pod2 = new Stack<>();
        //this is the corridor queue at the space station max 18 items are allowed
        private BlockingQueue<String> corridor = new ArrayBlockingQueue<>(18);
        //cargo bay
        private ArrayList<String> food = new ArrayList<>();
        private ArrayList<String> technical = new ArrayList<>();        
        private ArrayList<String> personal = new ArrayList<>(); 
        //other variables and markers
        private String t ="T";
        private String p ="P";
        private String f ="F";
               
        
    void option1() throws InterruptedException
    {

    try
        {
            
            System.out.println("Testing program.");
            System.out.println("Choose data file to test 1-9: ");
            System.out.println("1-7 are given text files, 8,9 are data run 1 and data run 2.");
            Scanner sc = new Scanner(System.in);
            int fnumber = sc.nextInt();
            //build a file name
            String nameoffile = "PodData"+Integer.toString(fnumber)+".txt" ;
            
            //System.out.println(nameoffile);
            
            
            //show stack and queue status before pods are loaded
            System.out.println("Stack [pod1] status pre-load: ");
            System.out.println(pod1);
            System.out.println("Stack [pod2] status pre-load: ");
            System.out.println(pod2);            
            System.out.println("Queue status [corridor] pre-load: ");
            System.out.println(corridor);
            
            
            File myFile = new File(nameoffile);
            FileReader fr = new FileReader(myFile);
            BufferedReader br = new BufferedReader(fr);
            String line = null;
            
            //variable to show half the way state of stack and queue
            int halfway=0;
      
            
            while((line=br.readLine())!=null)
                {
                    
                StringTokenizer st = new StringTokenizer(line, ",");
                int tokens = st.countTokens();
                
                
                halfway=tokens/2;
                
                while(st.hasMoreTokens())
                {                    
                    stacking.add(st.nextToken());                   
                }                                                        
                    //in case there is not enough items to take: 
                    if(tokens<9)
                    {
                        System.out.println("There is not enough cargo to load pod1 size: "+tokens);
                        System.out.println("Program will run incorrectly.");
                        for(int i=0; i<9; i++)
                        {
                            pod1.push(stacking.get(i));                            
                        }
                        for(int j=9; j<tokens; j++)
                        {
                            pod2.push(stacking.get(j));
                        }
                    }
                    
                    //in case there is too many items to take:
                    else if(tokens>18)
                    {
                        System.out.println("There is too much cargo to load, an error might occur (overwritten stack or queue blocked and waiting): "+tokens);
                        //for testing purpose
                        for(int i=0; i<9; i++)
                        {
                            pod1.push(stacking.get(i));
                        }
                        for(int j=9; j<tokens; j++)
                        {
                            pod2.push(stacking.get(j));
                        }
                    }
                    
                    
                    //in case there is just enough items to take:
                    else if(tokens>0&&tokens<=18)
                    {
                        for(int i=0; i<9; i++)
                        {
                            pod1.push(stacking.get(i));
                        }                       
                        for(int j=9; j<tokens; j++)
                        {
                            pod2.push(stacking.get(j));
                        }
                        
                        
                        //shuttle reaches the station: 
                        System.out.println("Pod1 status on reaching the station: ");
                        System.out.println(pod1);                        
                        System.out.println("Pod2 status on reaching the station: ");
                        System.out.println(pod2);
                        System.out.println("Corridor status on reaching the station: ");
                        System.out.println(corridor);
                        System.out.println("");
                    }
                    
                    //start queueing items: 
                    System.out.println("Unloading cargo at the corridor: ");
                    for(int k=0; k<9; k++)
                    {
                        if(halfway==k)
                          {
                              System.out.println("Stack 1 [pod1] status on half way unload: ");
                              System.out.println(pod1);
                              System.out.println("Stack 2 [pod2] status on half way unload: ");
                              System.out.println(pod2);
                              System.out.println("Queue [corridor] status on half way unload: ");
                              System.out.println(corridor);
                              System.out.println("");
                          }                    
                        corridor.put(pod1.pop());
                    }
                    for(int l=9; l<tokens; l++)
                    {
                        if(halfway==l)
                        {
                              System.out.println("Stack 1 [pod1] status on half way unload: ");
                              System.out.println(pod1);
                              System.out.println("Stack 2 [pod2] status on half way unload: ");
                              System.out.println(pod2);
                              System.out.println("Queue [corridor] status on half way unload: ");
                              System.out.println(corridor);
                              System.out.println("");
                        }                           
                        corridor.put(pod2.pop());
                   
                        
                    }
                    
                    System.out.println("Stack 1 [pod1] status after unloading: ");
                    System.out.println(pod1);
                    System.out.println("Stack 2 [pod2] status after unloading: ");
                    System.out.println(pod2);
                    System.out.println("Corridor status after unloading: ");
                    System.out.println(corridor);
                    System.out.println("");
                    
                    
                    //start sorting cargo from queue: 
                    System.out.println("Sorting cargo to the storage.");
                    
                    while(!corridor.isEmpty())
                    {
                        
                        if(corridor.peek().startsWith(t))
                        {
                            technical.add(corridor.remove());
                        }
                        else if(corridor.peek().startsWith(p))
                        {
                            personal.add(corridor.remove());
                        }
                        else if(corridor.peek().startsWith(f))
                        {
                            food.add(corridor.remove());
                        }
                        else
                        {
                            System.out.println("unknown cargo detected! ID: "+corridor.take()+" it will be cast into space.");
                        }
                    }
                        System.out.println("Food storage status:");
                        System.out.println(food);
                        System.out.println("Personal storage status:");
                        System.out.println(personal);
                        System.out.println("Technical storage status:");
                        System.out.println(technical);
                        System.out.println("Stack 1 [pod1] status after being used: ");
                        System.out.println(pod1);
                        System.out.println("Stack 2 [pod2] status after being used: ");
                        System.out.println(pod2);
                        System.out.println("Queue [corridor] status after being used: ");
                        System.out.println(corridor);

                }
            
            br.close();     
        }    
        
        catch(IOException e)
            {
                System.out.println("An unknown IO Error has occured");
            }    
    }
  
    
    void option2(Set<String> cargo1, Set<String> cargo2) throws InterruptedException
    {
      
        stacking.addAll(cargo1);
        stacking.addAll(cargo2);
        
        int halfway = stacking.size()/2;
        
        //show stack and queue status before pods are loaded
        System.out.println("Stack [pod1] status pre-load: ");
        System.out.println(pod1);
        System.out.println("Stack [pod2] status pre-load: ");
        System.out.println(pod2);            
        System.out.println("Queue status [corridor] pre-load: ");
        System.out.println(corridor);
        
        
        //in this case our pod1 will always be full and total number of elements never larger than 18
        for(int i=0; i<9;i++)
        {
            pod1.push(stacking.get(i));
        }
         
        if(stacking.size()>=9)
        {
            for(int j=9; j<stacking.size(); j++)
            {
                pod2.push(stacking.get(j));
            }
        }
        else if(stacking.contains("000"))
        {
            System.out.println("Pod2 is empty.");
        }
        else
        {
            System.out.println("An unknown error has occured.");
        }
        System.out.println("Pod1 status when reaching space station: ");
        System.out.println(pod1);
        System.out.println("Pod2 status when reaching space station: ");
        System.out.println(pod2);
        System.out.println("Corridor status when reaching space station: ");
        System.out.println(corridor);
        System.out.println("");
        System.out.println("");
        System.out.println("Unloading cargo at the corridor: ");
        
        //start unloading cargo to the corridor
        //pod1 unload
        for(int k=0; k<9; k++)
        {

            if(halfway==k)
            {
                System.out.println("Stack 1 [pod1] status on half way unload: ");
                System.out.println(pod1);
                System.out.println("Stack 2 [pod2] status on half way unload: ");
                System.out.println(pod2);
                System.out.println("Queue [corridor] status on half way unload: ");
                System.out.println(corridor);
                System.out.println("");
            }     
            corridor.put(pod1.pop());            
        }
        //pod2 unload
        if(!stacking.contains("000"))
        {
            for(int l=9; l<stacking.size(); l++)
            {
            if(halfway==l)
            {
                System.out.println("Stack 1 [pod1] status on half way unload: ");
                System.out.println(pod1);
                System.out.println("Stack 2 [pod2] status on half way unload: ");
                System.out.println(pod2);
                System.out.println("Queue [corridor] status on half way unload: ");
                System.out.println(corridor);
                System.out.println("");
            }                 
                corridor.put(pod2.pop());           
            }
        }
            //show status after unloading to the corridor
            System.out.println("Stack 1 [pod1] status after unloading: ");
            System.out.println(pod1);
            System.out.println("Stack 2 [pod2] status after unloading: ");
            System.out.println(pod2);
            System.out.println("Corridor status after unloading: ");
            System.out.println(corridor);
            System.out.println("");
                    
            System.out.println("Sorting cargo to the storage.");
                    
            while(!corridor.isEmpty())
            { 
                if(corridor.peek().startsWith(t))
                {
                    technical.add(corridor.remove());
                }
                else if(corridor.peek().startsWith(p))
                {
                    personal.add(corridor.remove());
                }
                else if(corridor.peek().startsWith(f))
                {
                    food.add(corridor.remove());
                }
                else
                {
                    System.out.println("unknown cargo detected! ID: "+corridor.take()+" it will be cast into space.");
                }
            }
            
        System.out.println("Food storage status:");
        System.out.println(food);
        System.out.println("Personal storage status:");
        System.out.println(personal);
        System.out.println("Technical storage status:");
        System.out.println(technical);    
        System.out.println("Stack 1 [pod1] status after being used: ");
        System.out.println(pod1);
        System.out.println("Stack 2 [pod2] status after being used: ");
        System.out.println(pod2);
        System.out.println("Queue [corridor] status after being used: ");
        System.out.println(corridor);

    }
 
}
