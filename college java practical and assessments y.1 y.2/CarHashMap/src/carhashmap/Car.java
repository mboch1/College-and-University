
package carhashmap;

/**
 *
 * @author duncanwalker
 */
public class Car 
{
   private String vin;
   private String description;
 
   
   public Car(String v, String desc)
    {
      vin =v;
      description = desc;
    }
   
   public String getVin()
   {
     return vin;  
   }
   
   
   public String getDescription()
   {
       return description;
   }
   
   @Override
   public String toString()
   {
     return "Vin : "+vin + " description "+description;  
   }
   
   @Override
   public int hashCode()
    {
     return vin.hashCode();
    }
   
   public boolean equals(Object obj)
   {
     if (obj instanceof Car)
      {
       Car tempCar = (Car)obj;  
       
       if (vin.equalsIgnoreCase(tempCar.vin))
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
       return false;  
     }
       
   }
   
   
   
   
}
