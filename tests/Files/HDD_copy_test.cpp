#include <iostream>
#include <fstream>
#include <sys/resource.h>
#include <chrono>

using namespace std;

int main() {

    char chunk;
    ifstream infile;
    ofstream outfile;

    // Start execution time
    clock_t start_1 = clock();
    auto start_2 = chrono::high_resolution_clock::now();

    // Start memory usage
    struct rusage usage;
    getrusage(RUSAGE_SELF, &usage);
    long memory_usage_start = usage.ru_maxrss; // in kilobytes
    
    // Code ----------------------------------------------------------
    infile.open("output.txt");
    outfile.open("/media/user/MyDrive1/output_copy.txt"); //PUT YOUR OWN PATH TO ANOTHER PARTITION
    if (!outfile.is_open()) {
        cout << "Error opening file!" << endl;
        return 1;
    }
    while (infile.get(chunk))
        outfile.put(chunk);
    infile.close();
    outfile.close();
    // ---------------------------------------------------------------
    
    // Stop measuring memory usage
    getrusage(RUSAGE_SELF, &usage);
    long memory_usage_end = usage.ru_maxrss; // in kilobytes

    // Stop measuring execution time
    clock_t end_1 = clock();
    auto end_2 = chrono::high_resolution_clock::now();
    double execution_time_1 = double(end_1 - start_1) / CLOCKS_PER_SEC;
    chrono::duration<double, milli> execution_time_2 = end_2 - start_2;

    // Printing result
    cout << "Execution Time (Based on ctime): " << execution_time_1 * 1000.0 << " ms" << endl;
    cout << "Execution Time (Based on chrono): " << execution_time_2.count() << " ms" << endl;
    cout << "Memory Usage: " << memory_usage_end - memory_usage_start << " KB" << endl;

    return 0;
}
