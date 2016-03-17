UNIT TESTS FOR ifocop GRIDS
------------------------

To run the unit tests for ifocop Grids:

1. Create a "tests" Compass project using the unit-tests pattern:

   compass create tests -r ifocop-grids --using=ifocop-grids/unit-tests

2. From inside the "tests" project, compare the compiled stylesheets to the
   previous unit test results in the test-results directory:

   diff -r test-results/ stylesheets/

   If the unit tests were successful, the above command should report no
   differences.
