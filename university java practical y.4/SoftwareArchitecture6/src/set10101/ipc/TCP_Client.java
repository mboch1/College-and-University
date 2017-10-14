package set10101.ipc;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.Socket;

/**
 * Usage:
 * 1)cd C:\\Users\\user\workspace\\SET10101\\bin
 * 2)java set10101.ipc.TCP_Client "Hello" "127.0.0.1"
 * 
 * @author Dr Lu Fan
 *
 */
public class TCP_Client {
	public static void main (String args[]) {
		Socket s = null;
		try {
			int serverPort = 7896;
			s = new Socket(args[1], serverPort);
			DataInputStream in = new DataInputStream( s.getInputStream());
			DataOutputStream out = new DataOutputStream( s.getOutputStream());
			out.writeUTF(args[0]); // UTF is a string encoding format
			String data = in.readUTF();
			s.close();
			System.out.println("Received: "+ data) ;
		} 
		catch (Exception e){
			System.out.println("Error:"+e.getMessage());
		}
	}
}
