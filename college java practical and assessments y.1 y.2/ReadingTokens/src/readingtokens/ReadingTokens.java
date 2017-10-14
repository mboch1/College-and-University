package readingtokens;

import java.io.*;
import java.util.ArrayList;
import java.util.StringTokenizer;


public class ReadingTokens 
{

    public static void main(String[] args) 
    {
        System.out.println("File reader: ");
        
        File myFile = new File ("CitiesLongandLat.txt");
        
        //bunch of empty variables
         ArrayList<String> token = new ArrayList<>();
         ArrayList<String> token1 = new ArrayList<>();
         ArrayList<String> token2 = new ArrayList<>();
         ArrayList<String> token3 = new ArrayList<>();
         ArrayList<String> token4 = new ArrayList<>();
         ArrayList<String> token5 = new ArrayList<>();
         ArrayList<String> token6 = new ArrayList<>();
         ArrayList<String> token7 = new ArrayList<>();
         ArrayList<String> token8 = new ArrayList<>();
         ArrayList<String> token9 = new ArrayList<>();
         
        //find the city with longest name
        int citylgth =0;
        int maxcitylgth =0;
        String token0max =null;
        
        //find the city with highest latitude
        int citylatdegrees=0;
        int citylatminutes=0;
        int maxcitylatdegrees=0;
        int maxcitylatminutes=0;
        String token0citylat=null;
        String tokenside=null;

        //find the city with highest longitude
        int citylondegrees=0;
        int citylonminutes=0;
        int maxcitylondegrees=0;
        int maxcitylonminutes=0;
        String token0citylon=null;
        String tokenside1=null;
        
        
        
        try
        {
            FileReader fr = new FileReader(myFile);
            BufferedReader br = new BufferedReader(fr);
            
            ArrayList<String> al = new ArrayList<>();
            
            String line = null; 
            
            while((line=br.readLine())!=null)
            {            
                StringTokenizer st = new StringTokenizer(line, ",");
                
                while(st.hasMoreTokens())
                {
                    //city name
                    token.add(st.nextToken());
                    //country name 
                    token1.add(st.nextToken());
                    
                    //latitude degrees minutes North-South
                    token2.add(st.nextToken());
                    token3.add(st.nextToken());
                    token4.add(st.nextToken());

                    //longitude degrees minutes East-West
                    
                    token5.add(st.nextToken());
                    token6.add(st.nextToken());
                    token7.add(st.nextToken());
 
                    //time zone time pm/am
                    token8.add(st.nextToken());
                    token9.add(st.nextToken());
                }
                
            }    

            br.close();
            
            System.out.println("*********************************************************************");
            System.out.println("*********************************************************************");
            System.out.println("*********************************************************************");
            System.out.println("File "+myFile+" closed");
            
            System.out.println(token);
            System.out.println(token1);
            System.out.println(token2);
            System.out.println(token3);
            System.out.println(token4);
            System.out.println(token5);
            System.out.println(token6);
            System.out.println(token7);
            System.out.println(token8);
            System.out.println(token9);
        }
        catch(IOException e)
        {
            System.out.println("File not found");  
        }
    }
    
}
