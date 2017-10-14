package mapsassesment;

import java.util.Objects;

/**
 *
 * @author Michal Bochenek
 */

public class Player 
{
    private String name;
    private String country;
    private int rating;
    private int birth;
    
    //constructor for class Player
    public Player(String player_name, String player_country, int player_rating, int player_birth)
    {
        name = player_name;
        country = player_country;
        rating = player_rating;
        birth = player_birth;
    }
    
    public String getName()
    {
        return name;
    }
    
    public String getCountry()
    {
        return country;
    }
    
    public int getRating()
    {
        return rating;
    }
    
    public int getByear()
    {
        return birth;
    }
    
    public String setName()
    {
        this.name = name;
        return name;
    }
    
    public String setCountry()
    {
        this.country = country;
        return country;
    }
    
    public int setRating()
    {
        this.rating = rating;
        return rating;
    }
    
    public int setByear()
    {
        this.birth = birth;
        return birth;
    }
    
    @Override
    public String toString()
    {
        return "Player name: "+name +" country of origin: "+country+" rating: "+rating+" birth year: "+birth;
    }

    @Override
   public boolean equals(Object obj)
    {
        if(obj instanceof Player)
        {
            Player tempPlayer = (Player)obj;
            
            if(name.equalsIgnoreCase(tempPlayer.name))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            System.out.println("object doesn't exist");
            return false;
        }
    }

    //unique hashcode
    @Override
    public int hashCode() 
    {
        int hash = 4;
        hash = hash + Objects.hashCode(this.name);
        hash = hash + this.rating;
        return hash;
    }

   

}        
