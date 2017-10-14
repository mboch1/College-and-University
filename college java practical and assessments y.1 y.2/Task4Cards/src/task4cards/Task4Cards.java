package task4cards;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Random;


public class Task4Cards 
{

    public static void main(String[] args) 
    { 
    // S-serce, P-Pik, T-Trefl, K-Karo, A-as, 2...10 W-walet, D-dama, O-krol
        
        ArrayList<String> deck1 = new ArrayList<>(
        Arrays.asList("2S","2P","2T","2K", "3S","3P","3T","3K","4S","4P","4T","4K",
         "5S","5P","5T","5K","6S","6P","6T","6K","7S","7P","7T","7K","8S","8P","8T","8K",
         "9S","9P","9T","9K","10S","10P","10T","10K","WS","WP","WT","WK",
         "DS","DP","DT","DK","OS","OP","OT","OK","AS","AP","AT","AK"));
        ArrayList<String> deck2 = new ArrayList<>(
        Arrays.asList("2S","2P","2T","2K", "3S","3P","3T","3K","4S","4P","4T","4K",
         "5S","5P","5T","5K","6S","6P","6T","6K","7S","7P","7T","7K","8S","8P","8T","8K",
         "9S","9P","9T","9K","10S","10P","10T","10K","WS","WP","WT","WK",
         "DS","DP","DT","DK","OS","OP","OT","OK","AS","AP","AT","AK"));
        ArrayList<String> deck3 = new ArrayList<>(
        Arrays.asList("2S","2P","2T","2K", "3S","3P","3T","3K","4S","4P","4T","4K",
         "5S","5P","5T","5K","6S","6P","6T","6K","7S","7P","7T","7K","8S","8P","8T","8K",
         "9S","9P","9T","9K","10S","10P","10T","10K","WS","WP","WT","WK",
         "DS","DP","DT","DK","OS","OP","OT","OK","AS","AP","AT","AK"));
        ArrayList<String> deck4 = new ArrayList<>(
        Arrays.asList("2S","2P","2T","2K", "3S","3P","3T","3K","4S","4P","4T","4K",
         "5S","5P","5T","5K","6S","6P","6T","6K","7S","7P","7T","7K","8S","8P","8T","8K",
         "9S","9P","9T","9K","10S","10P","10T","10K","WS","WP","WT","WK",
         "DS","DP","DT","DK","OS","OP","OT","OK","AS","AP","AT","AK"));
        
        ArrayList<String> facecards = new ArrayList<>(
                Arrays.asList("WS","WP","WT","WK","DS","DP","DT","DK","OS","OP","OT","OK", "AS", "AP", "AT", "AK"));
        
        ArrayList<String> shoe = new ArrayList<>();
        
        ArrayList<String> streak = new ArrayList<>();
        ArrayList<String> longestStreak = new ArrayList<>();
        
        Random rn = new Random();
        

        shoe.addAll(deck1);
        shoe.addAll(deck2);
        shoe.addAll(deck3);
        shoe.addAll(deck4);
          

        System.out.println(shoe);
        
        Collections.shuffle(shoe, rn);
        System.out.println(shoe);
        
        int count_streak = 0;
        int max_streak = 0;
        
        for(int i=0; i<208; i++)
        {
                if(facecards.contains(shoe.get(i)))
                {
                    streak.add(shoe.get(i));
                    count_streak++;
                }    
                    else if(!facecards.contains(i+1))
                    {
                        
                        longestStreak.addAll(streak);
                        streak.removeAll(streak);
                        
                        if(count_streak>max_streak)
                        {
                            longestStreak.removeAll(longestStreak);
                            max_streak=count_streak;
                            count_streak=0;
                            streak.removeAll(streak);
                            
                        }
                        else
                        {
                            streak.removeAll(streak);
                        }
                    }
                else
                    {
                    
                    }
        }
               System.out.println(longestStreak);
            }      
        }                



