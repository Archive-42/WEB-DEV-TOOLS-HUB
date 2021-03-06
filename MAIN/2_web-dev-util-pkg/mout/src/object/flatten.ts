import forOwn from './forOwn';
import isPlainObject from '../lang/isPlainObject';

/*
 * Helper function to flatten to a destination object.
 * Used to remove the need to create intermediate objects while flattening.
 */
function flattenTo(obj, result, prefix, level) {
    forOwn(obj, function(value, key) {
        const nestedPrefix = prefix ? `${prefix}.${key}` : key;

        if (level !== 0 && isPlainObject(value)) {
            flattenTo(value, result, nestedPrefix, level - 1);
        } else {
            result[nestedPrefix] = value;
        }
    });

    return result;
}

/**
 * Recursively flattens an object.
 * A new object containing all the elements is returned.
 * If level is specified, it will only flatten up to that level.
 */
function flatten(obj, level) {
    if (obj == null) {
        return {};
    }

    level = level == null ? -1 : level;
    return flattenTo(obj, {}, '', level);
}

export default flatten;
