// Implementing recursive solution
exports.recursive = function fibonacci( n ) {
    if ( n in fibonacci ) {
      return fibonacci[ n ];
    }
  // Store the fibonacci values on the function itself
  return fibonacci[ n ] = ( n < 2 ) ? n : fibonacci( n - 1 ) + fibonacci( n - 2 );
};

// Implementing iterative solution
exports.iterative = function fibonacci( n ) {
    const results = [ 0, 1 ];

  if ( n > 2 ) {
    for ( let i = 2; i < n; i++ ) {
      results[ i ] = results[ i - 2 ] + results[ i - 1 ];
    }
  }

  return results[ n - 1 ];
};

// Implementing O(logn) matrix solution
export function matrix( n ) {
  const memo = [ 0, [
    [ 0, 1 ],
    [ 1, 1 ]
  ] ];

  const matrixMultiply = ( A, B ) => {
      let C;

    if ( Array.isArray( B[ 0 ] ) ) {
      C = [
        [],
        []
      ];
      C[ 0 ][ 0 ] = A[ 0 ][ 0 ] * B[ 0 ][ 0 ] + A[ 1 ][ 0 ] * B[ 0 ][ 1 ];
      C[ 0 ][ 1 ] = A[ 0 ][ 1 ] * B[ 0 ][ 0 ] + A[ 1 ][ 1 ] * B[ 0 ][ 1 ];
      C[ 1 ][ 0 ] = A[ 0 ][ 0 ] * B[ 1 ][ 0 ] + A[ 1 ][ 0 ] * B[ 1 ][ 1 ];
      C[ 1 ][ 1 ] = A[ 0 ][ 1 ] * B[ 1 ][ 0 ] + A[ 1 ][ 1 ] * B[ 1 ][ 1 ];
    } else {
      C = [];
      C[ 0 ] = A[ 0 ][ 0 ] * B[ 0 ] + A[ 1 ][ 0 ] * B[ 1 ];
      C[ 1 ] = A[ 0 ][ 1 ] * B[ 0 ] + A[ 1 ][ 1 ] * B[ 1 ];
    }

    return C;
  };

  // Calculates fibonacci spiral transformation matrix
  const calcFibSpiral = n => {
      let count = 1;
      let T;

    if ( n & 1 ) {
      T = [
        [ 0, 1 ],
        [ 1, 1 ]
      ];
      n -= 1;
    } else {
      T = [
        [ 1, 0 ],
        [ 0, 1 ]
      ];
    }

    while ( n > 0 ) {
      count++;
      if ( !memo[ count ] ) {
        memo[ count ] = matrixMultiply( memo[ count - 1 ], memo[ count - 1 ] );
      }
      if ( ( n >>= 1 ) & 1 ) {
        T = matrixMultiply( T, memo[ count ] );
      }
    }

    return T;
  };

  return matrixMultiply( calcFibSpiral( n - 2 ), [ 1, 1 ] )[ 1 ];
  }

// Implements closed form solution.
export var closedForm = ( phi => {
      return n => {
          return Math.floor( phi ** n / Math.sqrt( 5 ) + 0.5 );
  };
} )( ( 1 + Math.sqrt( 5 ) ) / 2 );
