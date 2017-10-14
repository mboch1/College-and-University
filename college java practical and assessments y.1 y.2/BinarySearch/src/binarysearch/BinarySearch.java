package binarysearch;

public class BinarySearch 
{

   public static void main(String[] args) {
      searching bin =
         new searching();
      
      
      int[] a =
        { 2, 8,12,14,16,19,24,28,31,33,// 0-9
         39,40,45,49,51,53,54,56,57,60,// 10-19
         63,69,77,82,88,89,94,96,97};  // 20-28
      
      
      for (int i = 0; i < a.length; i++)
         System.out.print(bin.binarySearch(a,
            a[i]) + " ");
      System.out.println();
      System.out.print(bin.binarySearch(a,1) +" ");
      System.out.print(bin.binarySearch(a,26)+" ");
      System.out.print(bin.binarySearch(a,85)+" ");
      System.out.print(bin.binarySearch(a,99)+" ");
      System.out.println();
   }
}