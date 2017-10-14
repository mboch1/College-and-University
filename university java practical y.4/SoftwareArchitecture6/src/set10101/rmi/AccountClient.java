package set10101.rmi;

import java.rmi.Naming;

/**
 * Usage:
 * 1) cd C:\\Users\\user\\workspace\\SET10101\\bin\\
 * 2) java -Drmiregistry.port=1099 -Drmiregistry.host=127.0.0.1 set10101.rmi.AccountClient 1.25
 * 
 * @author Dr Lu Fan
 *
 */
public class AccountClient {
	public static void main(String[] args) {
		try {
			String host = System.getProperty("rmiregistry.host");
			String port = System.getProperty("rmiregistry.port");
			String url = "rmi://" + host + ":" + port + "/Account";
			Account acc = (Account) Naming.lookup(url);
			acc.deposit(new Double(args[0]).doubleValue());
			System.out.println("Total $" + acc.balance());
		} catch (Exception e) {
			System.out.println("AccountClient: exception:");
			e.printStackTrace();
		}
	}
}
