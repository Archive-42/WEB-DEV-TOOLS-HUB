export default (fn, delay, execAsap) => {
  let timeout; // Keeps a reference to the timeout inside the returned function

  return function () {
    // Continue to pass through the function execution context and arguments
    const that = this;

    const args = arguments;

    // If there is no timeout variable set, proceed to create a new timeout
    if ( !timeout ) {
      execAsap && fn.apply( that, args );

      timeout = setTimeout( () => {
            execAsap || fn.apply( that, args );
        // Remove the old timeout variable so the function can run again
        timeout = null;
      }, delay || 100 );
    }
  };
};
