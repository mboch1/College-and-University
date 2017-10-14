package set10101.rpc;

import org.acplt.oncrpc.*;
import org.acplt.oncrpc.server.*;
import java.io.IOException;

/**
 * Usage: 
 * Under Windows a portmapper service can be set up on port 111 by:
 * 1) cd C:\\Users\\user\\workspace\\SET10101\\lib\\
 * 2) java -cp portmap.jar org.acplt.oncrpc.apps.jportmap.jportmap 
 * 
 * Then, start the service in another console:
 * 3) cd C:\\Users\\user\\workspace\\SET10101\\bin\\
 * 4) java -cp C:\\Users\\user\\workspace\\SET10101\\lib\\oncrpc.jar;.\\ set10101.rpc.AccountServer
 * 
 * @author Dr Lu Fan
 *
 */
public class AccountServer extends AccountServerStub {
	private double sum;

	public AccountServer() throws OncRpcException, IOException {
		sum = 0.0;
	}

	public double balance_1() {
		return sum;
	}

	public void deposit_1(double d) {
		sum += d;
	}

	public static void main(String[] args) {
		try { 
			AccountServer server = new AccountServer();
			System.out.println("Account ready");
			server.run();
		} 
		catch ( Exception e ) 
		{ 
			e.printStackTrace(System.out); 
		}
	}
}
