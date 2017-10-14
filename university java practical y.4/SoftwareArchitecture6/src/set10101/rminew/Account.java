package set10101.rminew;

import java.rmi.RemoteException;


public class Account implements IAccount {

	private double sum;

	public Account() throws RemoteException {
		sum = 0;
	}

	public double balance() throws RemoteException {
		return sum;
	}

	public void deposit(double amount) throws RemoteException {
		sum += amount;		
	}
}
