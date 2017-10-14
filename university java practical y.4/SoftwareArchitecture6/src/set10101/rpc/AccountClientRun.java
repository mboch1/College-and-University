package set10101.rpc;

import org.acplt.oncrpc.*;
import java.net.InetAddress;
import java.io.IOException;

/**
 * Usage:
 * Firstly, generate three Java source files: Account.java,
 * AccountClient.java, and AccountServerStub.java from Account.x
 * 1) cd C:\\Users\\user\\workspace\\SET10101\\lib
 * 2) java -jar jrpcgen.jar -nobackup Account.x
 * 
 * Secondly, start the AccountServer...
 * 
 * Then, run the AccountClient by:   
 * 3) cd C:\\Users\\user\\workspace\\SET10101\\bin\\
 * 4) java -cp C:\\Users\\user\\workspace\\SET10101\\lib\\oncrpc.jar;.\\ set10101.rpc.AccountClientRun "127.0.0.1" "1.25"
 * 
 * @author Dr Lu Fan
 *
 */
public class AccountClientRun {

	public static void main(String [] args) {
		AccountClient client = null;
		try {
			client = new AccountClient(InetAddress.getByName("127.0.0.1"),
					OncRpcProtocols.ONCRPC_UDP);
			client.getClient().setTimeout(300*1000);
			client.deposit_1(new Double(1.25).doubleValue());
			System.out.println("Total $" + client.balance_1());
			client.close();
		} 
		catch ( Exception e )
		{
			e.printStackTrace(System.out); 
			}
	}	
}
