package set10101.rmi;

import java.rmi.Naming;

/**
 * Usage:
 * Start the RMI Registry by:
 * 1) start rmiregistry 1099
 * 
 * Then, start the server by:
 * 2) cd C:\\Users\\user\\workspace\\SET10101\\bin\\
 * 3) java -Djava.rmi.server.codebase=file:///C:/Users/user/workspace/SET10101/bin/ set10101.rmi.AccountServer
 * 
 * @author Dr Lu Fan
 *
 */
public class AccountServer {
	public  static void main(String args[]) {
		try {
			AccountImpl acc = new AccountImpl();
			String url = "rmi://localhost:1099/Account";
			Naming.rebind(url, acc);
			System.out.println("Account ready");
		} catch (Exception e) {
			System.out.println("AccountServer: exception:");
			e.printStackTrace();
		}
	}
}
