package set10101.rminew;

import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import java.rmi.server.UnicastRemoteObject;


/**
 * Usage run the server then run the client
 * When your finished stop the server
 *  
 * @author Dr 40004938
 *
 */
public class AccountServer{

	public  static void main(String args[]) {
		try { 
			
			//Start the registry
			 Registry registry = LocateRegistry.createRegistry(1099); 
			
	        // Instantiate the concrete class 
	         Account acc= new Account(); 
	    
	         // Export the stub using the interface specification
	         IAccount stub = (IAccount) UnicastRemoteObject.exportObject(acc, 0);  
	         
	         //Bind the stub to the name "Account" in the registry 
	         registry.bind("Account", stub);  
	         
	         System.out.println("Server ready");
	         
	      } catch (Exception e) { 
	         System.err.println("Server exception: " + e.toString()); 
	         e.printStackTrace(); 
	      } 
	}
}
