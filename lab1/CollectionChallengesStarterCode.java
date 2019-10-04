import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.ListIterator;
import java.util.Map;
import java.util.TreeMap;
import java.util.TreeSet;

/**
 *Lab 1: CollectionChallengesStarterCode is a series of empty methods that should be completed 
 *using the Collections Framework. 
 *The main method is a test driver of all the methods. It uses a unit testing style.
 *Methods are from codestepbystep.com and codingbat.com
 *Change made in second section of 2053
 * @author Kathleen Malone
=======
 * @author Kathleen Malone Villanova University
>>>>>>> b93e0692c6e4d26c9c3d0e7d112adb30c9357a70
 */
public class CollectionChallengesStarterCode {
		
		/**
		 * Write a method named removeRange that accepts an ArrayList of integers and two integer 
		 * values min and max as parameters and removes all elements in the range min through
		 * max (inclusive). For example, if an ArrayList named list stores
		 * [7, 9, 4, 2, 7, 7, 5, 3, 5, 1, 7, 8, 6, 7], the call of 
		 * removeRange(list, 5, 7); should change the list to store [9, 4, 2, 3, 1, 8].
		 * @param list
		 * @param min
		 * @param max
		 */			
		//hint: use an iterator
		public static void removeRange(ArrayList<Integer> list, int min, int max) {
				

				
		}
			
		/**
		 * Write a method named addStars that accepts as a parameter an ArrayList of Strings, 
		 * and modifies the list by placing a "*" element between elements, as well as at the start
		 * and end of the list. For example, if a list named list contains 
		 * {"the", "quick", "brown", "fox"}, 
		 * the call of addStars(list); should modify it to store 
		 * {"*", "the", "*", "quick", "*", "brown", "*", "fox", "*"}.
		 * @param vec
		 */
		//hint: use an iterator
		public static void addStars(ArrayList<String> vec) {
				
					
		}
			
		/**
		 * Write a method named wordCount that accepts an array of Strings as a parameter 
		 * and returns a count of the number of unique words in the array. 
		 * Do not worry about capitalization and punctuation; for example, "Hello" and "hello" and 
		 * "hello!!"
		 * are different words for this problem. Use a TreeSet as auxiliary storage.	
		 * @param words
		 * @return
		 */
		//hint: a TreeSet simplifies this solution
		public static int wordCountInTree(List<String> words) {
		
			return 0;
		}
			
		/**
		 * Given a map of food keys and topping values, modify and return the map as follows: 
		 * if the key "ice cream" is present, set its value to "cherry". 
		 * In all cases, set the key "bread" to have the value "butter".
		 * 
		 * topping1({"ice cream": "peanuts"})  {"bread": "butter", "ice cream": "cherry"}
		   topping1({})  {"bread": "butter"}
		   topping1({"pancake": "syrup"})  {"bread": "butter", "pancake": "syrup"}	
		 * @param map
		 * @return
		 */
		//Hint: check Javadocs for methods on HashMap
		//look at the method containsKey
		public static Map<String, String> topping1(Map<String, String> map) {
		
			 return null;
				 
		}

		/**
		 * The classic word-count algorithm: given an array of strings, 
		 * return a Map<String, Integer> with a key for each different string, 
		 * with the value the number of times that string appears in the array.

		  wordCount(["a", "b", "a", "c", "b"])  {"a": 2, "b": 2, "c": 1}
		  wordCount(["c", "b", "a"])  {"a": 1, "b": 1, "c": 1}
		  wordCount(["c", "c", "c", "c"]) {"c": 4}
		 * @param strings
		 * @return
		 */

		//hint :check if word already exists in Map
		//if yes increment count else add to map with value 1
		public static Map<String, Integer> wordCount(String[] strings) {
			  
			 return null;
			  
		}			

		public static void main(String[] args) {
			
			/*removeRange test*/
			Integer[] removeRange = {7, 9, 4, 2, 7, 7, 5, 3, 5, 1, 7, 8, 6, 7};
			ArrayList<Integer> list = new ArrayList<>();
			list.addAll(Arrays.asList(removeRange));			
			removeRange(list, 5, 7);
			//expected output [9, 4, 2, 3, 1, 8]
			System.out.println("removeRange expected "+"[9, 4, 2, 3, 1, 8]");
			System.out.println("removeRange actual   "+list);
			System.out.println();
			
			/*addStars test */
			//check ["*", "the", "*", "quick", "*", "brown", "*", "fox", "*"]
			String [] addStar = {"the", "quick", "brown", "fox"};
			ArrayList<String> sList = new ArrayList<>();
			sList.addAll(Arrays.asList(addStar));
			addStars(sList);
			System.out.println("addStars expected "+"[*, the, *, quick, *, brown, *, fox, *]");
			System.out.println("addStars actual   "+sList);
			System.out.println();
			
			
			/*wordCountInTrees test 
			 * should print 4*/
			System.out.println("wordCountInTrees expected "+ 4);
			ArrayList<String> list1 = new ArrayList<>();
			list1.addAll(Arrays.asList(addStar));
			list1.add("brown");
			System.out.println("wordCountInTrees actual   "+wordCountInTree(list1));
			System.out.println();
						
			/*
			 * test topping1 should print
			 * topping1({"ice cream": "peanuts"})  {"bread": "butter", "ice cream": "cherry"}
			 */
			Map<String, String> food = new HashMap<String, String>();
			food.put("ice cream", "peanuts");
			Map<String, String> m = topping1(food);
			System.out.println("topping1 expected "+ "{bread=butter, ice cream=cherry}");
			System.out.println("topping1 actual   "+m);
			System.out.println();
			
			/*wordCount should print
			 *  {"a": 2, "b": 2, "c": 1}
			 */
			String[] s = {"a", "b", "a", "c", "b"};
			Map<String, Integer> ret = wordCount(s);
			System.out.println("wordCount expected "+"{a=2, b=2, c=1}");
			System.out.println("wordCount actual   "+ret);
			System.out.println();	
		}
}
