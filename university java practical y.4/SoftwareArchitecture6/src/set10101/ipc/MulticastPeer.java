package set10101.ipc;

import java.net.DatagramPacket;
import java.net.InetAddress;
import java.net.MulticastSocket;

/**
 * 
 * Usage:
 * 1)cd C:\\Users\\user\workspace\\SET10101\\bin
 * 2)java set10101.ipc.MulticastPeer "Hello" "239.255.255.255"
 * 
 * @author Dr Lu Fan
 *
 */
public class MulticastPeer {
	public static void main(String args[]){
		MulticastSocket s = null;
		try {
			InetAddress group = InetAddress.getByName(args[1]);
			s = new MulticastSocket(6789);
			s.joinGroup(group);
			byte [] m = args[0].getBytes();
			DatagramPacket messageOut = new DatagramPacket(m, m.length, group, 6789);
			s.send(messageOut);			
			for(int i=0; i< 10; i++) { // get 10 messages from others in the group
				byte[] buffer = new byte[1000];
				DatagramPacket messageIn = new DatagramPacket(buffer, buffer.length);
				s.receive(messageIn);
				System.out.println("Received: " + new String(messageIn.getData(), 0, messageIn.getLength()));
			}
			s.leaveGroup(group);
			s.close();
		} catch (Exception e){
			System.out.println(e.getMessage());
		}
	}
}
