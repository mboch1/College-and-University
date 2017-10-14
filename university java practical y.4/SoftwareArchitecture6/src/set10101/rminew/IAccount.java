package set10101.rminew;

import java.rmi.Remote; 
import java.rmi.RemoteException; 

public interface IAccount extends Remote{
	double balance() throws RemoteException;
	void deposit(double amount) throws RemoteException;  	
}
