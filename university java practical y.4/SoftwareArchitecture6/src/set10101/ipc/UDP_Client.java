package set10101.ipc;

import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

/**
 * 
 * Usage:
 * 1)cd C:\\Users\\user\workspace\\SET10101\\bin
 * 2)java set10101.ipc.UDP_Client "Hello" "127.0.0.1"
 * 
 * @author Dr Lu Fan
 *
 */
public class UDP_Client {

	public static void main(String args[]){		
		DatagramSocket aSocket = null;
		try {
			aSocket = new DatagramSocket();
			byte [] m = args[0].getBytes();
			InetAddress aHost = InetAddress.getByName(args[1]);
			DatagramPacket request = new DatagramPacket(m, m.length,
					aHost, 6789);
			aSocket.send(request);
			byte[] buffer = new byte[1000];
			DatagramPacket reply = new DatagramPacket(buffer, buffer.length);
			aSocket.receive(reply);
			System.out.println("Reply: " + new String(reply.getData(), 0,
					reply.getLength()));
		} 
		catch (Exception e) {
			aSocket.close();
			System.out.println("Socket: " + e.getMessage());
		}
	}

}
