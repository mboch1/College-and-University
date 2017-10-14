package mapsassesment;

import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;
import java.util.Set;

/**
 *
 * @author Michal Bochenek
 */

public class MapsAssesment 
{


    public static void main(String[] args) 
    {
        //create new empty hash map containing player class
        Map<String, Player> players = new HashMap<>();
        
        //create player objects from the list of players Name, Country, Rating, B-year
        Player CM = new Player("Carlsen Magnus", "NOR", 2876, 1990);
        Player AV = new Player("Anand Viswanathan", "IND", 2804, 1969);
        Player CF = new Player("Caruana Fabiano", "ITA", 2803, 1992);
        Player NH = new Player("Nakamura Hikaru","USA", 2799, 1987);
        Player TV = new Player("Topalov Veselin", "BUL", 2798, 1975);
        Player GA = new Player("Grischuk Alexander","RUS", 2780, 1983);
        Player SW = new Player("So Wesley","USA", 2778, 1993);
        Player KV = new Player("Kramnik Vladimir","RUS", 2777, 1975);
        Player GAn = new Player("Giri Anish","NED", 2776, 1994);
        Player AL = new Player("Aronian Levon","ARM",2776,1982);
        Player DL = new Player("Ding Liren","CHN", 2757, 1992);
        Player VLM = new Player("Vachier-Lagrave Maxime","FRA",2754,1990);
        Player KS = new Player("Karjakin Sergev","RUS", 2753, 1990);
        Player ND = new Player("Navara David","CZE",2751,1985);
        Player TE = new Player("Tomashevsky Evgeny","RUS",2749,1987);
        Player LC = new Player("Li Chaob"," CHN", 2748, 1989);
        Player WR = new Player("Wojtaszek Radoslaw","POL",2746, 1987);
        Player GB = new Player("Gelfand Boris","ISR",2744,1968);
        Player AM = new Player("Adams Michael","ENG",2740,1971);
        Player JD = new Player("Jakovenko Dmitry","RUS", 2738,1983);
        
        //add players to the map, getname is the key
        
        players.put(CM.getName(), CM);
        players.put(AV.getName(), AV);
        players.put(CF.getName(), CF);
        players.put(NH.getName(), NH);
        players.put(TV.getName(), TV);
        players.put(GA.getName(), GA);
        players.put(SW.getName(), SW);
        players.put(KV.getName(), KV);
        players.put(GA.getName(), GA);
        players.put(AL.getName(), AL);
        players.put(DL.getName(), DL);
        players.put(VLM.getName(), VLM);
        players.put(KS.getName(), KS);
        players.put(ND.getName(), ND);
        players.put(TE.getName(), TE);
        players.put(LC.getName(), LC);
        players.put(WR.getName(), WR);
        players.put(GB.getName(), GB);
        players.put(AM.getName(), AM);
        players.put(JD.getName(), JD);
        
        
        Set<Map.Entry<String, Player>> plset = players.entrySet(); 
            
        System.out.println("These are map contents: ");
        System.out.println("");
        
        for(Map.Entry<String, Player> entry : plset)
        {
            System.out.println("key: "+entry.getKey());
            System.out.println("value: "+entry.getValue());
            System.out.println("");
        }
        
        
        //display hashcode
        System.out.println("Hashcode for this map is: "+players.hashCode());
        
        
        //given a key find a player with that key if he doesn't exist display a relevant message
        System.out.println("Please give a key to find a player entry (example - Carlsen Magnus): ");
         
        Scanner sc = new Scanner(System.in);
        String searchkey = sc.nextLine();
  
        try
        {
            System.out.println(players.get(searchkey).toString());
        }
        catch(Exception e)
        {
            System.out.println("Player not found");
        }

        //try to add player with a key that already exists
        Player CG = new Player("John Doe", "MOON", 3333, 1900);
        
        try
        {
            System.out.println("Add new player (John Doe) with a key (Carlsen Magnus) that already exists: ");
            players.put(CM.getName(), CG);
            System.out.println(players.get("Carlsen Magnus").toString());
        }
        catch(Exception e)
        {
            System.out.println("An error has occured!");
        }
        
    }
    
}
