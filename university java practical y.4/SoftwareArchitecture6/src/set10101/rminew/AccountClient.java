package set10101.rminew;

import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;

import javax.swing.JOptionPane;
import javax.swing.text.NumberFormatter;

public class AccountClient {
	
	public static void main(String[] args) throws InterruptedException {
		try {
			// Get the registry from the server (null = local host)
			Registry registry = LocateRegistry.getRegistry(null);

			// Look up the remote object
			IAccount stub = (IAccount) registry.lookup("Account");

			//deposit some cash 
			stub.deposit(Double.parseDouble(JOptionPane.showInputDialog("How Much Would You Like To Deposit")));
			
			//print balance
			System.out.println("The Account balance is now " +stub.balance());						
			
		} catch (Exception e) {
			System.err.println("Client exception: " + e.toString());
			e.printStackTrace();
		}
	}
}
