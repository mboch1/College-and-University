package set10101.rmi;

import java.rmi.server.UnicastRemoteObject;
import java.rmi.RemoteException;

/**
 * Usage:
 * Generate Skel and Stub by:
 * 1) cd C:\\Users\\user\\workspace\\SET10101\\bin\\
 * 2) rmic -vcompat set10101.rmi.AccountImpl  
 * AccountImpl_Skel.class and AccountImpl_Stub.class will be generated.
 * 
 * @author Dr Lu Fan
 *
 */
public class AccountImpl extends UnicastRemoteObject 
implements Account {
	private double sum;

	public AccountImpl() throws RemoteException {
		sum = 0.0;
	}

	public double balance() throws RemoteException {
		return sum;
	}

	public void deposit(double amount) throws RemoteException {
		sum += amount;
	}
}
