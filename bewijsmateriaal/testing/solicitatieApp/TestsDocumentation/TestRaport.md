# **Tested Stories Summary:**

#### _Check their respective folders for more context_

> ## 1. **[CP2077-63]**

| Test Type       | Status                                                            | Type of Test |
| --------------- | ----------------------------------------------------------------- | ------------ |
| E2E Tests       | ![PASS](https://via.placeholder.com/15/00ff00/000000?text=+) PASS | Programmed   |
| Component Tests | ![PASS](https://via.placeholder.com/15/00ff00/000000?text=+) PASS | Programmed   |

### **Issues encountered during testing**:

All of the tests were failing because during the component test, the component wasn't being mounted before each test. One of the tests was failing because I was checking the attributes instead of the text.

### **Conclusions**:

The component is working and behaving as expected.

> ## 2. **[CP2077-12]**

| Test Type         | Status                                                            | Type of Test |
| ----------------- | ----------------------------------------------------------------- | ------------ |
| E2E Tests         | ![PASS](https://via.placeholder.com/15/00ff00/000000?text=+) PASS | Programmed   |
| Component Tests   | ![PASS](https://via.placeholder.com/15/00ff00/000000?text=+) PASS | Programmed   |
| Form Output Tests | ![PASS](https://via.placeholder.com/15/00ff00/000000?text=+) PASS | Manual       |

### **Issues encountered during testing**:

Can't test if the input field contains what's inputted because mui isn't supported in cypress. Still can confirm via manual testing
the fields do infact contain what was typed in.

### **Conclusions**:

Form component is working and behaving as expected. The output matches the input.

> ## 3. **[CP2077-18]**

> ## 4. **[CP2077-35]**

> ## 5. **[CP2077-39]**

> ## 6. **[CP2077-15]**

> ## 7. **[CP2077-42]**

> ## 8. **[CP2077-48]**

<!-- ![pass](https://via.placeholder.com/15/00ff00/000000?text=+) PASS
![fail](https://via.placeholder.com/15/ff0000/000000?text=+) FAIL -->
